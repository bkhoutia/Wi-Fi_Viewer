# 📶 Wi-Fi Viewer

**Wi-Fi Viewer** is a simple, lightweight PHP-based tool designed to display Wi-Fi network details on Windows systems using shell commands.

It provides two main features:
- 🔍 View the **currently connected Wi-Fi network** and its password.
- 📋 List **all saved Wi-Fi profiles** and display their stored passwords.

---

## ⚙️ Features

- Clean, responsive UI using plain PHP + HTML + JavaScript.
- Works locally on Windows machines with WAMP/XAMPP/Laragon.
- One-click password copying to clipboard.
- Dynamic loading of Wi-Fi data with no page reloads.

---

## 📁 Project Structure

| File              | Description                                    |
|-------------------|------------------------------------------------|
| `index.php`       | Main page with navigation and Wi-Fi list.     |
| `current_wifi.php`| Shows currently connected Wi-Fi SSID/password.|
| `get_wifi.php`    | Returns all saved Wi-Fi profiles as JSON.     |

---

## 🚀 Usage

1. Clone or download the repository.
2. Place it in your local web server directory (e.g. `www` or `htdocs`).
3. Start Apache via WAMP/XAMPP.
4. Open `http://localhost/Wi-Fi_Viewer/` in your browser.

> ⚠️ Works only on **Windows OS** with PHP having access to `shell_exec()`.

---

## 🔐 Disclaimer

This tool is intended for **educational and personal use only**.  
Please **do not deploy on public servers** as it exposes sensitive data.

---

## 📅 Project Info

- **Author**: Mohamed Amine Bkhoutia  
- **Created**: May 3, 2025  
- **Version**: 1.0  
- **License**: MIT

---

## 🙌 Contributions

Pull requests and improvements are welcome!  
Feel free to fork this repo or open an issue if you encounter a bug.

