<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: square;
            margin-left: 20px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Your Name</h1>
    <p>Email: your.email@example.com</p>
    <p>Phone: (123) 456-7890</p>

    <h2>Summary</h2>
    <p>A brief summary about yourself and your career goals.</p>

    <h2>Education</h2>
    <ul>
        <li><strong>Degree Name</strong> - University Name</li>
        <li><em>Graduation Date</em></li>
    </ul>

    <h2>Experience</h2>
    <ul>
        <li><strong>Job Title</strong> - Company Name</li>
        <li><em>Start Date - End Date</em></li>
        <li>Description of your responsibilities and achievements in this role.</li>
    </ul>

    <h2>Skills</h2>
    <ul>
        <li>Skill 1</li>
        <li>Skill 2</li>
        <li>Skill 3</li>
    </ul>
</div>
</body>
</html>
