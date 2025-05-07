<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #23242a;
}

/* Box Styles */
.box {
    position: relative;
    width: 370px;
    height: 450px;
    background: #1c1c1c;
    border-radius: 50px 5px;
    overflow: hidden;
}

/* Animation Styles */
.box::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 370px;
    height: 450px;
    background: linear-gradient(60deg, transparent, #45f3ff, #45f3ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
}

.box::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 370px;
    height: 450px;
    background: linear-gradient(60deg, transparent, #d9138a, #d9138a);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
}

/* Keyframes for Animation */
@keyframes animate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Form Styles */
form {
    position: absolute;
    inset: 2px;
    border-radius: 50px 5px;
    background: #28292d;
    z-index: 10;
    padding: 30px;
    display: flex;
    flex-direction: column;
}

/* Heading Styles */
h2 {
    color: #45f3ff;
    font-size: 35px;
    font-weight: 500;
    text-align: center;
}

/* Input Box Styles */
.input-box {
    position: relative;
    margin-top: 35px;
}

.input-box input {
    width: 100%;
    padding: 20px 10px;
    background: transparent;
    border: none;
    outline: none;
    color: #ffffff; /* White text color */
    font-size: 1rem;
    letter-spacing: 0.05em;
    z-index: 10;
}

/* Placeholder Styles */
.input-box input::placeholder {
    color: #8f8f8f; /* Light grey placeholder text */
}

/* Span Styles */
.input-box span {
    position: absolute;
    left: 10px;
    top: 20px;
    font-size: 1rem;
    color: #8f8f8f;
    pointer-events: none;
    letter-spacing: 0.05em;
    transition: 0.5s ease;
}

.input-box input:valid ~ span,
.input-box input:focus ~ span {
    color: #45f3ff;
    transform: translateY(-30px);
    font-size: 0.75rem;
}

/* Submit Button Styles */
input[type="submit"] {
    font-size: 20px;
    border: none;
    background: #45f3ff;
    padding: 10px;
    margin-top: 30px;
    font-weight: 600;
    cursor: pointer;
}

input[type="submit"]:active {
    background: linear-gradient(90deg, #45f3ff, #d9138a);
    opacity: 0.8;
}

    </style>
</head>
<body>
    <div class="box">
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <h2>Sign</h2>
            <div class="input-box">
                <input name="email" type="text" required>
                <span>Enter email</span>
            </div>
            <div class="input-box">
                <input name="password" type="password" required>
                <span>Enter Password</span>
            </div>
            @if (session('error'))
                <span class="text-danger">{{ session('error') }}</span>
            @endif
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
