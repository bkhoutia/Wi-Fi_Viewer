<?php
/**
 * Wi-Fi Viewer
 * 
 * This project is a simple web-based tool for viewing Wi-Fi details. 
 * It provides two main functionalities:
 * 1. Displaying the current Wi-Fi connection details.
 * 2. Listing all available Wi-Fi networks.
 * 
 * The interface is designed to be user-friendly, with a clean and responsive layout.
 * 
 * Files:
 * - index.php: Main entry point with navigation options.
 * - current_wifi.php: Displays details of the current Wi-Fi connection.
 * - get_wifi.php: Lists all available Wi-Fi networks.
 * 
 * Author: Mohamed Amine Bkhoutia
 * Date: May 3, 2025
 * Version: 1.0
 * linkedIn: www.linkedin.com/in/mohamed-amine-bkhoutia
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wi-Fi Viewer</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .box {
            background: white;
            padding: 30px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .button:hover {
            background: #388E3C;
            transform: translateY(-2px);
        }
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }
        footer a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #388E3C;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>📶 View Wi-Fi Details</h2>
    <a class="button" href="current_wifi.php">Show Current Wi-Fi</a>
    <a class="button" href="get_wifi.php">Show Wi-Fi List</a>
</div>
<footer>
    &copy; 2025 Mohamed Amine Bkhoutia. All rights reserved. 
    <a href="https://www.linkedin.com/in/mohamed-amine-bkhoutia" target="_blank">LinkedIn</a>
</footer>
</body>
</html>
