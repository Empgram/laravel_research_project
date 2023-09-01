<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
</head>
<body>
    <h1>Email Form</h1>
    
    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('send.email') }}">
        @csrf
        <label for="recipient">Recipient Email:</label><br>
        <input type="email" id="recipient" name="recipient" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
