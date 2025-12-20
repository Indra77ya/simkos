## 2024-10-24 - Dashboard Modernization
**Learning:** Adding a modern touch to legacy layouts (Bootstrap 3/Ace Admin) is most effective with subtle shadows, rounded corners, and generous whitespace. Overriding legacy borders with `border: none !important` and replacing with `box-shadow` instantly lifts the UI.
**Action:** When modernizing old admin panels, focus on card-like containers and interactive hover states for data widgets.
## 2024-10-24 - Login Loading State
**Learning:** Users often double-click login buttons when on slow connections, leading to duplicate requests or confusion.
**Action:** Always implement a loading state (disable button + spinner/text) for async actions, especially login/submit forms.
