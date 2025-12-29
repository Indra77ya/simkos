<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbtools extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn7');		
		$this->auth->authorize();
	}
	
	public function backup()
	{	
		$this->config->set_item('mysubmenu', 'mn71');
		$this->template->set('breadcrumbs','<h1>Database Tools<small> <i class="ace-icon fa fa-angle-double-right"></i> Back Up Database</small></h1>');
		$this->template->set('pagetitle','Halaman Backup Database');		
		$this->template->load('default','setting/vbackup',compact('str'));
	}
	
	
	 public  function dobackup(){
		 $this->config->set_item('mysubmenu', 'mn71');
        // Load Clas Utilitas Database
        $this->load->dbutil();
		 $nama = 'backup_sikos_'. date("Y-m-d") ;
        // nyiapin aturan untuk file backup
        $aturan = array(    
                'format'      => 'zip',            
                'filename'    =>  $nama.'.sql'
              );
 
 
        $backup =& $this->dbutil->backup($aturan);
 
        $nama_database = 'backup_sikos_'. date("Y-m-d") .'.zip';
        $simpan = 'public/backup/'.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
 
        $this->load->helper('download');
        force_download($nama_database, $backup);
       
	   }

	  
	   public function restore()
	{	
		$this->config->set_item('mysubmenu', 'mn72');
		$this->template->set('breadcrumbs','<h1>Database Tools<small> <i class="ace-icon fa fa-angle-double-right"></i> Restore Database</small></h1>');
		$this->template->set('pagetitle','Halaman Restore Database');		
		$this->template->load('default','setting/vrestore',compact('str'));
	}
	 public function dorestore(){
			$nama_file = $_FILES['inputfile']['name'];			
			// Remove $config['file_name'] to allow CodeIgniter to handle naming (avoiding overwrites or strict naming if any)
            // But actually, we just want to ensure we accept whatever the user sends.
            // Let's rely on standard upload behavior which is flexible.
			$config['upload_path'] = './public/upload_restore';
			$config['allowed_types'] = 'sql|txt|zip';
			$config['max_size']    = '20480'; // 20MB limit
			
			$this->load->library('upload', $config);

			if (  $this->upload->do_upload('inputfile')){
				$dataUpload = $this->upload->data();
				$filepath = $dataUpload['full_path'];
				$uploaded_ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
				$temp_extracted_path = '';

				if ($uploaded_ext == 'zip') {
					$zip = new ZipArchive;
					if ($zip->open($filepath) === TRUE) {
						// Find the first .sql file
						$sqlFileIndex = -1;
						for($i = 0; $i < $zip->numFiles; $i++) {
							$filename = $zip->getNameIndex($i);
							if (strtolower(pathinfo($filename, PATHINFO_EXTENSION)) == 'sql') {
								$sqlFileIndex = $i;
								break;
							}
						}

						if ($sqlFileIndex != -1) {
							$sqlFileName = $zip->getNameIndex($sqlFileIndex);
							$zip->extractTo('./public/upload_restore/', $sqlFileName);
							$zip->close();
							$temp_extracted_path = './public/upload_restore/' . $sqlFileName;
							$filepath = $temp_extracted_path; // Update filepath to point to the extracted SQL
						} else {
							echo "<script>alert('Error: No .sql file found inside the ZIP archive.');window.location.href='".site_url('dbtools/restore')."';</script>";
							unlink($filepath);
							return;
						}
					} else {
						echo "<script>alert('Error: Failed to open ZIP file.');window.location.href='".site_url('dbtools/restore')."';</script>";
						unlink($filepath);
						return;
					}
				}

				// Disable DB Debugging to prevent crash on "Table exists" error
				$old_db_debug = $this->db->db_debug;
				$this->db->db_debug = FALSE;

				// Turn off foreign key checks temporarily
                $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

                $handle = fopen($filepath, "r");
                if ($handle) {
                    $templine = '';
                    $success_count = 0;
                    $error_count = 0;
                    $errors = array();

                    while (($line = fgets($handle)) !== false) {
                        // Skip it if it's a comment
                        if (substr($line, 0, 2) == '--' || $line == '')
                            continue;
                        if (substr($line, 0, 2) == '/*')
                            continue;

                        // Add this line to the current segment
                        $templine .= $line;

                        // If it has a semicolon at the end, it's the end of the query
                        if (substr(trim($line), -1, 1) == ';') {
                            // Perform the query
                            if(!$this->db->query($templine)){
								$errorNum = $this->db->_error_number();

								// Error 1050: Table already exists. Try to Drop and Re-create.
								if ($errorNum == 1050) {
									if (preg_match('/CREATE\s+TABLE\s+(?:IF\s+NOT\s+EXISTS\s+)?[`"]?([a-zA-Z0-9_]+)[`"]?/i', $templine, $matches)) {
										$tblName = $matches[1];
										$this->db->query("DROP TABLE IF EXISTS " . $tblName);

										// Retry the query
										if ($this->db->query($templine)) {
											$success_count++;
											$templine = '';
											continue;
										}
									}
								}

                                 $error_count++;
                                 // Simple logging of the error (in a real app, maybe log to file)
                                 $errors[] = "Error (" . $errorNum . ") at: " . substr(strip_tags($templine), 0, 50) . "...";
                            } else {
                                 $success_count++;
                            }
                            // Reset temp variable to empty
                            $templine = '';
                        }
                    }
                    fclose($handle);

                    $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

					// Restore DB Debug
					$this->db->db_debug = $old_db_debug;

                    // Set feedback message
                    $msg = "Restore complete. Executed: $success_count queries. Failed: $error_count queries.";
                    if($error_count > 0){
                        $msg .= "\nTop errors: " . implode(", ", array_slice($errors, 0, 3));
                    }

                    // Use json_encode to safe-guard the string for JS
                    echo "<script>alert(".json_encode($msg).");window.location.href='".site_url('dbtools/restore')."';</script>";
                } else {
                    echo "Error opening uploaded file.";
                }

                // Clean up
                unlink($filepath); // This deletes the SQL file (either original or extracted)

                // If we extracted a zip, we also need to delete the original zip file
                if ($uploaded_ext == 'zip' && !empty($dataUpload['full_path']) && file_exists($dataUpload['full_path'])) {
                     unlink($dataUpload['full_path']);
                }

			}else{
				 $error = array('error' => $this->upload->display_errors());
				 echo "GAGAL UPLOAD: ";
				 print_r($error);
				 exit();
			}
		
	 }
	
}
