<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            position: relative;
            margin: 20px;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0;
        }
        .content {
            text-align: justify;
            margin-top: 50px;
        }
        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            text-align: center;
            width: 45%;
        }
        .signature p {
            margin: 10px 0 0;
        }
        .signature img {
            width: 150px;
            height: auto;
        }
        .signature .name {
            border-top: 1px solid black;
            padding-top: 10px;
            margin-top: 10px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="watermark">
        <img src="{{ asset('images/logo1.png') }}" alt="Barangay Logo" width="300">
    </div>

    <div class="header">
        <img src="{{ asset('images/logo1.png') }}" alt="Barangay Logo">
        <h2>Republic of the Philippines</h2>
        <h2>City of Pateros</h2>
        <h2>Barangay Sto. Rosario Silangan</h2>
    </div>

    <div class="content">
        <h1 style="text-align: center;">Barangay Clearance</h1>
        <p>This is to certify that <strong>{{ $request->first_name }} {{ $request->middle_name }} {{ $request->last_name }} {{ $request->suffix }}</strong>, of legal age, is a law-abiding citizen and a resident of Barangay Sto. Rosario Silangan, City of Pateros. This certification is issued upon the request of the above-named person for whatever legal purpose it may serve.</p>
        <p>Issued this {{ now()->format('jS') }} day of {{ now()->format('F, Y') }} at Barangay Sto. Rosario Silangan, City of Pateros.</p>
    </div>

    <div class="signature-section">
        <div class="signature">
            {{-- <img src="{{ asset('images/signature_captain.png') }}" alt="Signature"> --}}
            <p class="name"><strong>Hon. Brgy Capt. Eduardo G. Masinloc</strong></p>
        </div>
        <br><br>
        <div class="signature">
            {{-- <img src="{{ asset('images/signature_requester.png') }}" alt="Signature"> --}}
            <p class="name"><strong>{{ $request->first_name }} {{ $request->middle_name }} {{ $request->last_name }} {{ $request->suffix }}</strong></p>
            <p>Requester's Signature</p>
        </div>
    </div>

    <div class="footer">
        <p>This document is not valid without the official seal of Barangay XYZ.</p>
    </div>
</body>
</html>
