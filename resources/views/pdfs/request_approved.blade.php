<!DOCTYPE html>
<html>
<head>
    <title>Request Approved</title>
</head>
<body>
    <h1>Request Approved</h1>
    <p>Details:</p>
    <ul>
        <li>Request Type: {{ $request->request_type }}</li>
        <li>Approved By: {{ $request->approved_by }}</li>
        <li>Date: {{ $request->created_at }}</li>
    </ul>
</body>
</html>
