# Classroom_Device_Booking_Platform
📌 Overview
The Classroom Device Booking System is a web-based platform built using PHP to manage classroom devices like projectors and Laptops.
It streamlines booking requests, prevents double bookings, and implements First-Come, First-Served (FCFS) scheduling and Deadlock simulation to mimic operating system concepts in a practical scenario.

✨ Features
User Authentication – Signup and login system for teachers and admins.

Role-Based Dashboards:

Teacher Dashboard – Book devices, view booking status.

Admin Dashboard – View all bookings, approve/reject requests, handle deadlock alerts.

Scheduling Algorithm – Implements FCFS for booking order.

Deadlock Simulation – Visual representation of resource allocation deadlocks.

Responsive UI – Clean interface with internal CSS styling.

Session Management – Secure logout system.

🗂 Folder Structure
bash
Copy
Edit
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
🛠 Technologies Used
Frontend: HTML5, CSS3 (Internal CSS)

Backend: PHP 7+

Database: MySQL

Server: Apache (XAMPP/WAMP)

🚀 Installation
Clone or Download this repository and extract it into your web server’s htdocs folder.

Create a MySQL Database (e.g., device_booking).

Import SQL File – Import the provided .sql file (if available) into your database.
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

-- Insert default admin user:
INSERT INTO users (name, username, password, role)
VALUES ('Admin', 'admin', '2468', 'admin');
Update Database Credentials in db.php:
$conn = mysqli_connect("localhost", "root", "", "device_booking");
Run the Project – Open a browser and go to:

http://localhost/OSProject/

📸 Screenshots
<img width="1919" height="909" alt="Screenshot 2025-08-05 191111" src="https://github.com/user-attachments/assets/5c9be7a0-9931-4de6-bef5-5b575e8c7f09" />

<img width="1900" height="906" alt="Screenshot 2025-08-05 191608" src="https://github.com/user-attachments/assets/9f8d2100-eead-4f48-b7b6-3a77ef0e2ae3" />

<img width="1918" height="900" alt="Screenshot 2025-08-05 191304" src="https://github.com/user-attachments/assets/afa7d636-544b-47cc-b494-343932c5972a" />

 <img width="1919" height="901" alt="Screenshot 2025-08-05 192123" src="https://github.com/user-attachments/assets/cb4f2874-24d7-4283-9513-01035d919ea3" />

 <img width="1903" height="903" alt="Screenshot 2025-08-05 192105" src="https://github.com/user-attachments/assets/06fa63d0-5b76-4ba6-ba19-758541436483" />


👤 Author
Developed by Rehnuma as part of an Operating Systems project.

📄 License
This project is open-source for educational purposes.
