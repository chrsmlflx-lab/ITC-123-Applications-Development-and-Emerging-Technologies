<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }
        section {
            background: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        h3 {
            margin-bottom: 25px;
            color: #4CAF50;
            font-size: 22px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            text-align: left;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background: #fdfdfd;
            transition: 0.3s;
        }
        input:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0px 0px 6px rgba(76,175,80,0.4);
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: #45a049;
            transform: scale(1.02);
        }
        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
<section>
    <form method="POST" action="loginprocess.php">
        <h3>User Log-in</h3>
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</section>
</body>
</html>
