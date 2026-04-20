# 🏟️ Sporty — Sports Venue Booking System

Sporty is a web-based platform that connects **customers** with **sports venue owners**, making it easy to discover, browse, and book sports facilities online. Whether you're looking for a badminton court, football field, or basketball court — Sporty has you covered.

> 🤝 *This is a group project built collaboratively with a team of 5. My role focused on the venue owner interface and several core features — details in the [Team & Contributions](#-team--contributions) section below.*

---

## 📸 Screenshots

| Venue Owner Interface|

<img width="1263" height="575" alt="6136333442560934688" src="https://github.com/user-attachments/assets/07214bf7-90e2-45d0-abe8-3664ce1d1a70" />&nbsp;<img width="1265" height="585" alt="6136333442560934687" src="https://github.com/user-attachments/assets/a3f8e891-700f-4729-97cd-fbd8cb5381d2" /> <img width="1267" height="586" alt="6136333442560934686" src="https://github.com/user-attachments/assets/7cc8e4c8-b410-4bf7-99a7-b7cbf6295f7c" />
 

---

## ✨ Features

### 👤 For Customers
- Register and log in securely
- Search and browse available sports venues
- Book a venue online in just a few clicks
- View and manage your bookings

### 🏢 For Venue Owners
- Register as a venue owner
- Add and manage your sports venues
- View incoming bookings via a dedicated dashboard
- Accept or manage customer reservations

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 7.4
- MySQL
- A local server (e.g. [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/))

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Adlina01/Sporty.git
   cd Sporty
   ```

2. **Set up the database**
   - Open phpMyAdmin (or your MySQL client)
   - Create a new database named `sporty`
   - Import the provided `.sql` file

3. **Configure the connection**
   - Open the database config file and update your credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "sporty";
   ```

4. **Run the project**
   - Place the project folder inside `htdocs` (XAMPP) or `www` (WAMP)
   - Start Apache and MySQL from your control panel
   - Visit `http://localhost/Sporty` in your browser

---

## 👥 User Roles

| Role | Description |
|---|---|
| **Customer** | Browse venues and make bookings |
| **Venue Owner** | List venues and manage reservations |

---

## 📁 Project Structure

```
Sporty/
├── css/                  # Stylesheets
├── js/                   # JavaScript files
├── venue_owner/          # Venue owner dashboard pages
├── index.php             # Landing page
├── index_sm.php          # Secondary index
├── login.php             # Login page
├── logout.php            # Logout handler
├── booking.php           # Booking page
├── booking_cust.php      # Customer booking view
├── booking_process.php   # Booking logic handler
└── README.md
```

---

## 👥 Team & Contributions

Sporty was built as a **group project** by a team of 5 members.

### My Contributions — Adlina Amalin
I was responsible for the **venue owner side** of the application, including:

- 🔐 **Login & Register** — Built the authentication system for both customers and venue owners
- 🏢 **Venue Owner Dashboard** — Designed and developed the dashboard interface for venue owners
- ➕ **Add Venue** — Implemented the form and logic for owners to list new sports venues
- ✏️ **Edit Venue** — Built the ability for owners to update their venue details
- 🗑️ **Delete Venue** — Implemented venue removal with confirmation handling
- 📋 **Booking History** — Developed the page for owners to view and track all booking records

**Adlina Amalin** — [@Adlina01](https://github.com/Adlina01)

---

## 📄 License

This project is for educational purposes. Feel free to explore the code!

