# 🚍 Cloud-Based Bus Pass System

## 📌 Overview
The Cloud-Based Bus Pass System is a web platform for automating bus pass registration, application, and management. It ensures efficient, secure, and scalable handling of user applications and approvals. The system serves both users and administrators, enhancing accessibility and reducing manual processes.

---

## 📦 Features
✅ **Bus Pass Renewal & Management**  
✅ **Suspend & Refund Passes**  
✅ **Secure Payment Integration**  
✅ **Automated Notifications**  
✅ **Admin Dashboard for Management**  

---

## 🛠 **Installation Guide**

### **1️⃣ Install XAMPP**
1. Download and install **XAMPP** from [Apache Friends](https://www.apachefriends.org/index.html).
2. Open **XAMPP Control Panel** and **Start Apache & MySQL**.

### **2️⃣ Clone the Project**
```sh
git clone https://github.com/Denny0404/Cloud-Based-Bus-Pass-System.git
cd Cloud-Based-Bus-Pass-System
```

### **3️⃣ Move Files to XAMPP**
1. Move the **buspasssystem** folder to:
   ```
   C:\xampp\htdocs\
   ```

### **4️⃣ Set Up the Database**
1. Open **phpMyAdmin** at:
   ```
   http://localhost/phpmyadmin/
   ```
2. Click **New** and create a database:
   ```
   Database Name: travel
   ```
3. Import the provided **database.sql** file:
   - Click **Import** > **Choose File** > Select `database.sql`
   - Click **Go** to execute.

### **5️⃣ Configure Database Connection**
Edit `connection.php` inside `buspasssystem/`:
```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "travel";  // Database Name

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

---

## 🚀 **Run the Project**
1. **Start XAMPP** (Apache & MySQL must be running).
2. Open a web browser and enter:
   ```
   http://localhost/buspasssystem/
   ```

---

## 🧪 **Testing the Application**
To ensure everything is working correctly, run unit tests:

### **1️⃣ Install Python Dependencies**
```sh
pip install pytest requests coverage
```

### **2️⃣ Run Automated Tests**
Execute tests with:
```sh
python -m pytest test_php_backend.py --maxfail=1 --disable-warnings
```

### **3️⃣ Code Coverage Report**
```sh
python -m coverage run -m unittest test_php_backend.py
python -m coverage report -m
python -m coverage html
```

---

## 🌍 **Deploying the Project Online**
### **Option 1: Hosting on Local Server**
Use **ngrok** to expose your local server:
```sh
ngrok http 80
```
Copy the **Forwarding URL** and share.

### **Option 2: Hosting on a Web Server**
1. Purchase **web hosting** with PHP & MySQL support.
2. Upload the **buspasssystem** folder to the server via **cPanel** or **FTP**.
3. Import the **database.sql** into the hosting MySQL.
4. Update `connection.php` with server credentials.

---

## 📄 **How to Contribute**
Want to improve the project? Follow these steps:

1. **Fork** this repo.
2. **Clone** your fork:
   ```sh
   git clone https://github.com/yourusername/Cloud-Based-Bus-Pass-System.git
   ```
3. **Create a new branch:**
   ```sh
   git checkout -b feature-branch
   ```
4. **Make changes & commit:**
   ```sh
   git add .
   git commit -m "Added a new feature"
   ```
5. **Push changes:**
   ```sh
   git push origin feature-branch
   ```
6. **Create a Pull Request** on GitHub.

---


## 🛠 **Troubleshooting**
### **1️⃣ "Connection failed" error in MySQL**
- Check `connection.php` settings.
- Make sure `XAMPP` MySQL is running.

### **2️⃣ Apache Port Conflict**
- Change **Apache port** in:
  ```
  XAMPP Control Panel > Config > httpd.conf
  ```
- Find `Listen 80` and change it to:
  ```
  Listen 8080
  ```

---
