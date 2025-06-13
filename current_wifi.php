<?php
header('Content-Type: text/html; charset=utf-8');

function getCurrentWifiName() {
    $output = shell_exec('netsh wlan show interfaces');
    if (preg_match('/^\s*SSID\s*:\s(.*)/m', $output, $matches)) {
        return trim($matches[1]);
    }
    return null;
}

function getWifiPassword($profileName) {
    // Sanitize the profile name to avoid command injection or parsing issues
    $safeProfile = escapeshellarg($profileName);
    // Build the command with the sanitized profile name
    $command = 'netsh wlan show profile name=' . $safeProfile . ' key=clear';
    $output = shell_exec($command);
    
    if (preg_match('/Key Content\s*:\s(.*)/', $output, $matches)) {
        return trim($matches[1]);
    } else {
        return 'N/A';
    }
}

$ssid = getCurrentWifiName();

if ($ssid) {
    $password = getWifiPassword($ssid);
} else {
    $password = "Not connected to any Wi-Fi";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Current Wi-Fi</title>
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
        p {
            color: #555;
            font-size: 1.1em;
            margin: 10px 0;
        }
        .pw {
            font-size: 1.5em;
            color: #2e7d32;
            cursor: pointer;
            font-weight: bold;
        }
        .pw:hover {
            text-decoration: underline;
            color: #1b5e20;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>📶 Current Wi-Fi Network</h2>
    <p><strong>SSID:</strong> <?= htmlspecialchars($ssid ?? 'N/A') ?></p>
    <p><strong>Password:</strong> 
        <span class="pw" onclick="copyToClipboard(this)">
            <?= htmlspecialchars($password) ?>
        </span>
    </p>
</div>

<script>
function copyToClipboard(el) {
    const text = el.textContent;
    navigator.clipboard.writeText(text).then(() => {
        el.innerText = text + ' ✅';
        setTimeout(() => {
            el.innerText = text;
        }, 1500);
    });
}
</script>

</body>
</html>
