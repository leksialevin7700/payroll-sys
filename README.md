# Payroll System

A web-based Payroll System built with PHP for managing and displaying employee payroll, earnings, government and private deductions, and overtime payments.

## Features

- **Employee Login:** Securely view your personal payroll details using your unique employee number.
- **Personal Information:** Access and manage personal and bank details.
- **Earnings Overview:** View detailed breakdowns of earnings including basic pay, allowances, gross, deductions, and net pay.
- **Government Deductions:** Track deductions like GPF, NPS, CGEGIS, IT, and more.
- **Private Deductions:** View and manage LIC, PLI, cooperative, association, and other private deductions.
- **Overtime & Special Payments:** See overtime (OT) earnings and related allowances.
- **Session Management:** Ensures only authenticated users can access payroll data.

## Technologies Used

- **Backend:** PHP (with MySQLi/PDO)
- **Frontend:** HTML, CSS
- **Database:** MySQL

## Setup Instructions

1. **Clone the repository:**
    ```bash
    git clone https://github.com/leksialevin7700/payroll-sys.git
    ```

2. **Database Setup:**
    - Create a MySQL database named `pay_roll`.
    - Import the necessary tables (`persnl_info`, `n_earnings`, `n_gov_recy`, `n_pvt_recy`, `n_ot_earn`, etc.) as referenced in the PHP files.
    - Update database credentials in the PHP files if needed (default: `root`/no password).

3. **Configure Web Server:**
    - Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
    - Make sure PHP and MySQL services are running.

4. **Access the Application:**
    - Open your browser and go to `http://localhost/payroll-sys/`
    - Log in using a valid employee number (`per_no`).

## Usage

- After logging in, use the navigation menu to access:
    - **Earnings:** View salary and allowance details.
    - **OT:** Check overtime payments.
    - **Govt-Detection:** Track government deductions.
    - **Private-Detection:** View private deductions.
    - **PIS:** Access personal information summary.

## File Structure

- `persnl.php` – Personal info page
- `earning (1).php` – Earnings breakdown
- `gov (1).php` – Government deductions
- `pvt.php` – Private deductions
- `ot (2).php` – Overtime earnings
- `configg (1).php` – Database connection (PDO)
- Other files for specific earnings/deductions types

## Notes

- **Security:** Ensure to secure database credentials for production use.
- **Customization:** Adjust database fields and queries as per your organization's payroll structure.
- **No warranty or license:** This project does not specify a license; use at your own risk.

---
