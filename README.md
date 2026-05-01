# 🧼 HOMIOKLIN: Web-Based Cleaning Service Management Platform

<p align="center">
  <img src="https://img.shields.io/badge/Platform-Web_Application-blue?style=for-the-badge" alt="Platform">
  <img src="https://img.shields.io/badge/Focus-Service_Management-cyan?style=for-the-badge" alt="Focus">
  <img src="https://img.shields.io/badge/Workflow-Multi_Role_System-green?style=for-the-badge" alt="Workflow">
</p>

---

## 🧠 Why I Built This

HOMIOKLIN is a cleaning service business based in Malang that provides services such as home cleaning, sofa cleaning, bed cleaning, and deep cleaning. Like many service businesses, its operations can become fragmented when customer requests, admin confirmation, field worker coordination, work reporting, and customer follow-up are handled manually through separate communication channels.

This led to a key question:

> *How can a local cleaning service business manage customer bookings, admin validation, field worker execution, and customer notification in one integrated workflow?*

---

## 🚀 What I Built

I developed **HOMIOKLIN**, a web-based cleaning service management platform for a local cleaning service business in Malang, designed to connect three main users in one structured service workflow:

- **Customers** can explore cleaning services, submit booking requests, upload reference photos, and track booking history.
- **Admins** can review bookings, manage service data, monitor revenue, manage users, and confirm or reject customer requests.
- **Field workers** can view assigned tasks, update task progress, confirm job completion, and submit work reports based on real on-site conditions.

HOMIOKLIN is not only a service landing page — it is an **end-to-end operational system** for managing cleaning service workflows.

---

## 🎯 Project Context

- **Type:** Web Application Project
- **Field:** Service Management System / Business Operations
- **Business Context:** Local cleaning service business in Malang, Indonesia
- **Focus:** Booking workflow, role-based access, task tracking, and customer communication
- **Users:** Customer, Admin, and Field Worker

---

## ⚙️ My Approach

Instead of building a simple cleaning service website, I focused on designing a complete business workflow from service discovery to job completion.

### 1. Customer-Centered Booking

Customers often struggle to explain cleaning needs clearly through chat alone.

➡️ I designed a structured booking flow where customers can select service details, schedule work, describe room or furniture conditions, add access notes, and upload photos as references.

---

### 2. Admin Validation Workflow

Service requests need to be reviewed before being processed operationally.

➡️ I built an admin confirmation flow that allows admins to review incoming bookings, inspect details, and accept or reject requests before assigning them to field workers.

---

### 3. Field Worker Execution

Cleaning work depends heavily on real on-site conditions.

➡️ I designed a worker-side workflow where field workers can view assigned jobs, inspect customer requests, update task status, and submit reports based on actual conditions found during service execution.

---

### 4. Automated Customer Communication

Manual follow-up can slow down the service process.

➡️ After a worker marks a job as completed, the system automatically sends a WhatsApp notification to the customer with service completion information and the final payment amount.

---

## 🔄 Full System Workflow

1. Customer explores available cleaning services.
2. Customer submits a booking request with schedule, location details, room condition, and optional photo.
3. Admin reviews the incoming booking request.
4. Admin confirms or rejects the booking.
5. Confirmed jobs are assigned to field workers.
6. Field workers review task details and process the job.
7. Field workers submit a work report based on real field conditions.
8. Field workers mark the task as completed.
9. The system automatically sends a WhatsApp notification to the customer.
11. Customer completes the payment manually based on the final service amount.
12. Admin records the received payment into the system.
13. Admin can monitor revenue, booking status, users, workers, and payment history.

---

## ✨ Key Features

- **🏠 Business Landing Page**  
  Presents HOMIOKLIN’s cleaning service value proposition and available services.

- **🧾 Customer Booking System**  
  Allows customers to schedule services, describe cleaning needs, add access notes, and upload reference photos.

- **📋 Booking History**  
  Enables customers to track submitted service requests and monitor booking status.

- **🛠️ Admin Booking Confirmation**  
  Allows admins to validate incoming customer requests before they are processed.

- **📊 Admin Dashboard**  
  Displays operational metrics such as booking status, customers, field workers, payments, and revenue.

- **👷 Field Worker Task Management**  
  Enables workers to view assigned tasks, inspect job details, and update task progress.

- **📝 Work Report Submission**  
  Allows field workers to document actual conditions, actions taken, work duration, and final service costs.

- **💬 WhatsApp Notification Automation**  
  Automatically notifies customers when a service has been completed and provides payment information.

- **💳 Manual Payment Recording**  
  Allows admins to record customer payments after service completion, keeping revenue and payment history organized even without an online  payment gateway.
---

## 🌍 Real-World Value

HOMIOKLIN helps cleaning service businesses manage their operations more clearly by reducing scattered communication and centralizing the workflow between customers, admins, and workers.

### Impact Highlights

- Improves booking clarity through structured customer request forms.
- Helps admins validate service requests before assigning tasks.
- Supports field workers with clear task details and reporting tools.
- Improves customer transparency through booking history and WhatsApp notifications.
- Reduces manual follow-up after service completion.

---

## 🛠️ Tech Stack

| Category | Tools & Technologies |
| :--- | :--- |
| **Frontend** | HTML, CSS, JavaScript |
| **Backend** | Laravel / PHP |
| **Database** | MySQL |
| **UI Design** | Responsive Web Interface |
| **Communication** | WhatsApp Notification Integration |
| **System Type** | Multi-role Web Application |

---

## 📸 System Preview

### 🏠 Business Overview
<p align="center">
  <img src="Business Overview.png" alt="Homioklin Landing Page" width="85%"/>
</p>

<p align="center">
  <em>
    HOMIOKLIN landing page presenting the business value proposition and cleaning services offered for homes, apartments, and furniture in Malang.
  </em>
</p>

---

### 📊 Admin Dashboard
<p align="center">
  <img src="Admin Dashboard.png" alt="Homioklin Admin Dashboard" width="85%"/>
</p>

<p align="center">
  <em>
    Admin dashboard for monitoring total revenue, annual booking statistics, and revenue trends to support service operations and business decision-making.
  </em>
</p>

---

### 🔄 Service Workflow

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <!-- Baris Pertama: Customer & Admin -->
  <tr>
    <td align="center" width="50%">
      <img src="Customer Booking Interface.png" alt="Customer Booking" style="width:100%; border-radius:8px; aspect-ratio: 1 / 1; object-fit: cover;"/>
      <br><strong>Customer Booking</strong>
    </td>
    <td align="center" width="50%">
      <img src="Admin Booking Confirmation Interface.png" alt="Admin Confirmation" style="width:100%; border-radius:8px; aspect-ratio: 1 / 1; object-fit: cover;"/>
      <br><strong>Admin Confirmation</strong>
    </td>
  </tr>
  <!-- Baris Kedua: Worker & WhatsApp -->
  <tr>
    <td align="center" width="50%">
      <img src="Worker Task Management Interface.png" alt="Worker Task" style="width:100%; border-radius:8px; aspect-ratio: 1 / 1; object-fit: cover;"/>
      <br><strong>Worker Management</strong>
    </td>
    <td align="center" width="50%">
      <img src="Automated Whatsapp Notification.jpeg" alt="WA Notification" style="width:100%; border-radius:8px; aspect-ratio: 1 / 1; object-fit: cover;"/>
      <br><strong>WhatsApp Notification</strong>
    </td>
  </tr>
</table>

<p align="center">
  <em>
    Alur kerja sistem: Dimulai dari input pelanggan, konfirmasi admin, pelaksanaan oleh petugas lapangan, hingga notifikasi otomatis.
  </em>
</p>
---

## 📈 Learning Journey

### Challenges & How I Solved Them

#### 1. Designing a Multi-Role Workflow
**Challenge:**  
The system needed to support different user roles with different responsibilities: customers, admins, and field workers.

**Solution:**  
I structured the system into separate workflows so each role could access only the features relevant to their tasks.

---

#### 2. Connecting Booking with Field Execution
**Challenge:**  
A booking system alone is not enough if the job cannot be tracked operationally.

**Solution:**  
I connected customer bookings with admin validation and field worker task management, allowing the system to track the service process from request to completion.

---

#### 3. Reducing Manual Communication
**Challenge:**  
Service completion usually requires manual follow-up with customers.

**Solution:**  
I integrated automatic WhatsApp notification after task completion to improve communication transparency and reduce manual follow-up.

---

## 🧠 What I Learned

Through this project, I learned how to design a web system around a real business workflow, not just individual pages or CRUD features. I strengthened my ability to think from multiple user perspectives, build role-based systems, and connect customer requests, admin decisions, worker execution, and customer communication into one complete operational flow.

---

## 🎯 Project Summary

HOMIOKLIN is a web-based cleaning service management platform built for a local cleaning service business in Malang, connecting customers, admins, and field workers in one integrated workflow, from service discovery and booking to task execution, reporting, and automated WhatsApp notification. This project strengthened my ability to design business-oriented web applications that solve operational problems through structured workflows, role-based access, and service process automation.
