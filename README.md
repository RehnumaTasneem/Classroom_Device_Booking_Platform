# Classroom Device Booking Platform

## 📌 Overview  
The **Classroom Device Booking System** is a web-based platform built using **PHP** to manage classroom devices like **projectors** and **laptops**.  
It streamlines booking requests, prevents double bookings, and implements **First-Come, First-Served (FCFS)** scheduling and **Deadlock simulation** to mimic operating system concepts in a practical scenario.

---

## ✨ Features  
- **User Authentication** – Signup and login system for teachers and admins.  
- **Role-Based Dashboards**:  
  - **Teacher Dashboard** – Book devices, view booking status.  
  - **Admin Dashboard** – View all bookings, approve/reject requests, handle deadlock alerts.  
- **Scheduling Algorithm** – Implements FCFS for booking order.  
- **Deadlock Simulation** – Visual representation of resource allocation deadlocks.  
- **Responsive UI** – Clean interface with internal CSS styling.  
- **Session Management** – Secure logout system.  

---

## 🗂 Folder Structure  
```
OSProject/
│── index.php                # Homepage
│── login.php                 # User login
│── signup.php                # User registration
│── dashboard_teacher.php     # Teacher dashboard
│── process_booking.php       # Handles booking requests
│── fcfs_queue.php            # FCFS scheduling algorithm
│── logout.php                # Logout script
│── db.php                    # Database connection
│── /admin
│   ├── dashboard_admin.php   # Admin dashboard
│   ├── view_bookings.php     # View all booking requests
│   ├── deadlock_alerts.php   # Deadlock simulation
│   ├── update_status.php     # Approve/reject requests
│── assets/                   # Background images, icons
```

---

## 🛠 Technologies Used  
- **Frontend**: HTML5, CSS3 (Internal CSS)  
- **Backend**: PHP 7+  
- **Database**: MySQL  
- **Server**: Apache (XAMPP/WAMP)  

---

## 🚀 Installation  

1. **Clone or Download** this repository and extract it into your web server’s `htdocs` folder.  
2. **Create a MySQL Database** (e.g., `device_booking`).  
3. **Import SQL File** – If no `.sql` file is available, run the following SQL commands:  

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(50),
    role VARCHAR(10)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    device VARCHAR(50),
    date DATE,
    time_slot VARCHAR(20),
    status VARCHAR(20)
);

-- Insert default admin user
INSERT INTO users (name, username, password, role)
VALUES ('Admin', 'admin', '2468', 'admin');
```

4. **Update Database Credentials** in `db.php`:  
```php
$conn = mysqli_connect("localhost", "root", "", "device_booking");
```
5. **Run the Project** – Open a browser and go to:  
```
http://localhost/OSProject/
```

---

## 📸 Screenshots  
*(Add screenshots here)*  
- Login Page  
- Teacher Dashboard  
- Admin Dashboard  
- Deadlock Simulation  

---

## 👤 Author  
Developed by **[Your Name]** for an Operating Systems course project.  
