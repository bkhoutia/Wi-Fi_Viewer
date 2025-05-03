<?php
function getWifiProfiles() {
    $output = shell_exec('netsh wlan show profiles');
    preg_match_all('/All User Profile\s*:\s(.*)/', $output, $matches);
    return array_map('trim', $matches[1]);
}

function getWifiPassword($profileName) {
    $command = 'netsh wlan show profile name="' . $profileName . '" key=clear';
    $output = shell_exec($command);
    
    if (preg_match('/Key Content\s*:\s(.*)/', $output, $matches)) {
        return trim($matches[1]);
    } else {
        return 'N/A';
    }
}

$wifiProfiles = getWifiProfiles();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wi-Fi Password Viewer</title>
    <style>
        /* Existing styles */
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
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 90%;
            max-width: 400px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        table {
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td.copyable {
            cursor: pointer;
            color: #2e7d32;
            font-weight: bold;
        }
        td.copyable:hover {
            text-decoration: underline;
            color: #1b5e20;
        }
        td:last-child {
            text-align: center;
        }
        @media (max-width: 600px) {
            table {
                width: 100%;
            }
            th, td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<h2>📶 Saved Wi-Fi Networks & Passwords</h2>
<p>Type in the search box to filter Wi-Fi networks in real-time.</p>

<input type="text" id="search" placeholder="Search Wi-Fi name..." onkeyup="filterTable()">

<table id="wifiTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Wi-Fi Name</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $counter = 1; // Initialize a counter for numbering
        foreach ($wifiProfiles as $profile): 
            $pwd = getWifiPassword($profile);
        ?>
        <tr>
            <td><?= $counter++ ?></td>
            <td class="wifi-name"><?= htmlspecialchars($profile) ?></td>
            <td class="copyable" onclick="copyToClipboard(this)"><?= htmlspecialchars($pwd) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function filterTable() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const rows = document.querySelectorAll('#wifiTable tbody tr');

    rows.forEach(row => {
        const wifiName = row.querySelector('.wifi-name').textContent.toLowerCase();
        if (wifiName.includes(searchInput)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function copyToClipboard(td) {
    const text = td.textContent;
    navigator.clipboard.writeText(text).then(() => {
        td.style.color = "green";
        td.innerHTML = text + ' ✅';
        setTimeout(() => {
            td.innerHTML = text;
            td.style.color = "#2e7d32";
        }, 1000);
    });
}
</script>

</body>
</html>
