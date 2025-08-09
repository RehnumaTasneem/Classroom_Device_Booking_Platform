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
<img width="1919" height="909" alt="Screenshot 2025-08-05 191111" src="https://github.com/user-attachments/assets/15b36d2e-1f36-4f66-9ccf-6bb500450368" />

<img width="1900" height="906" alt="Screenshot 2025-08-05 191608" src="https://github.com/user-attachments/assets/13f45654-029b-4774-aac9-7d6be4af6ce9" />

<img width="1919" height="901" alt="Screenshot 2025-08-05 192123" src="https://github.com/user-attachments/assets/e953e628-6754-4238-88a5-20bc65901c1b" />

<img width="1918" height="900" alt="Screenshot 2025-08-05 191304" src="https://github.com/user-attachments/assets/66f7a83d-3f8f-4d44-a077-8c62dfb34628" />

<img width="1903" height="903" alt="Screenshot 2025-08-05 192105" src="https://github.com/user-attachments/assets/20bd752f-56cf-40f4-8fe6-6f26af01ec45" />

<img width="1901" height="901" alt="Screenshot 2025-08-05 192005" src="https://github.com/user-attachments/assets/3a15a316-14eb-4703-b374-af1b5f1a64b7" />

---

## 👤 Author  
Developed by **Rehnuma** for an Operating Systems course project.  
