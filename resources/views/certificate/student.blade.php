<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Sertifikat</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/custom/tree_hr_logo.png') }}">
    <style>
        * {
          font-family: "Helvetica Neue", sans-serif;
        }
        body{
            /* line-height: initial !important; */
        }
        .ktp-card {
            width: 1000px;
            /* kamu bisa sesuaikan */
            aspect-ratio: 904 / 1280;
            background-color: #f2f5de;
            /* print-color-adjust: exact; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
        }

        img {
            position: absolute;
        }
        /* ul li::before {
          list-style-type: disc;
          content: "• ";
          color: black;
        } */
        ul {
          list-style: none;
          padding: 0;
          margin: 0;
        }

        ul li {
          display: flex;
          align-items: flex-start;
          margin-bottom: 3px;
        }

        ul li::before {
          content: "•";
          display: inline-block;
          width: 0.3em;
          margin-right: 8px;
          font-weight: bold;
        }

        .type-text {
            position: absolute;
            text-align: center;
            width: 350px;
            height: 107px;
            /* aspect-ratio: 370 / 110; */
            /* border: 1px solid #f2f5de; */
            top: 0px;
            display: flex;
            left: 150px;
            justify-content: center !important;
            /* horizontal */
            align-items: center !important;
            font-weight: 800;
            font-size: 18px;
        }
        .name-text {
            position: absolute;
            text-align: left;
            width: 360px;
            height: 110px;
            /* aspect-ratio: 370 / 110; */
            /* border: 1px solid #d97509; */
            top: 160px;
            display: flex;
            left: 0px;
            align-items: center;
            padding-left: 10px;
            font-weight: 800;
            font-size: 18px;
        }
        .result-text {
            position: absolute;
            text-align: left;
            height: 120px;
            /* aspect-ratio: 370 / 110; */
            /* border: 1px solid #d97509; */
            top: 160px;
            left: 420px;
            display: flex;
            right: 70px;
            align-items: center;
            font-weight: 800;
            font-size: 14px;
        }
        .tab {
            display: inline-block;
            margin-left: 40px;
        }
        .left-side {
          position: absolute;
          top: 300px;
          left: 20px;
        }
        .energi-kepribadian {
          background-color: #ffffff;
          /* position: absolute; */
          width: 465px;
          margin-top: 25px;
          border: 1px solid #d3d3d3;
          border-radius: 30px;
          padding-left: 20px;
          padding-right: 20px;
          padding-top: 10px;
          padding-bottom: 10px;
          font-size: 12px;
          line-height: 15px;
        }
        .bold-text {
          font-weight: 800;
        }
        .section-title {
          background-color: #4d9aff;
          color: #ffffff;
          border-radius: 5px;
          padding: 3px 10px;
          /* padding-top: 10px; */
          font-weight: 500;
          font-size: 12px;
        }
        .karakteristik {
          position: absolute;
          /* top: 748px;
          left: 20px; */
          margin-top: 10px;
        }
        .right-side {
          position: absolute;
          top: 300px;
          left: 560px;
          right: 20px;
        }
        .gaya-kerja {
          position: absolute;
        }
        .tb {
          background-color: #ffffff;
          /* padding: 0 1vw; */
          font-size: 12px;
          border-collapse: collapse;
        }
        .tb th {
            background-color: #4d9aff;
            color: #ffffff;
            font-weight: bold;
        }
        .tb td, th {
          border: 1px solid rgb(208, 208, 208); /* Example: 1px solid black border */
          padding: 10px;
        }
        .table-dimensi {
          /* position: absolute; */
          margin-top: 25px;
          /* top: 325px; */
          /* left: 560px; */
          /* right: 20px; */
        }
        .table-aspek {
          /* position: absolute; */
          margin-top: 35px;
          top: 773px;
          width: 510px;
          left: 20px;
        }
        .potensi-kekuatan {
          margin-top: 10px;
          position: absolute;
          /* top: 1155px; */
          /* left: 20px; */
        }
        .table-potensi {
          margin-top: 35px;
          position: absolute;
          /* top: 1180px; */
          width: 510px;
          /* left: 20px; */
        }
        .domain-text {
          position: absolute;
          bottom: 18px;
          right: 150px;
          font-weight: 600;
          font-size: 16px;
          color: white;
        }
        .ttd-container {
          background: #ffffff;
          /* position: absolute; */
          /* right: 20px; */
          /* bottom: 300px; */
          /* left: 560px; */
          left: 0px;
          right: 0px;
          border: 1px solid rgb(208, 208, 208);
          height: 100px;
          padding-left: 20px;
          display: flex;
          justify-content: start;
          align-items: center;
          font-size: 11px;
        }
        .signature {
          /* position: absolute; */
          /* background-color: #4d9aff; */
          width: 150px;
          right: 30px;
          /* bottom: 320px; */
        }
        p {
          margin: 0px;
        }
        .btn-download {
          display: block;
          margin: 0 auto;
          background-color: #4d9aff;
          color: #ffffff;
          padding: 5px;
          border-radius: 10px
          border: 3px solid #4d9aff;
        }
        .tree-hr {
          position: absolute;
          width: 300px;
          bottom: -25px;
          right: 80px;
        }




        .btn {
          display: block;
          margin: 0 auto;
          border: none;
          width: 15em;
          height: 5em;
          border-radius: 3em;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 12px;
          background: #1C1A1C;
          cursor: pointer;
          transition: all 450ms ease-in-out;
        }

        .sparkle {
          fill: #AAAAAA;
          transition: all 800ms ease;
        }

        .text {
          font-weight: 600;
          color: #AAAAAA;
          font-size: medium;
        }

        .btn:hover {
          background: linear-gradient(0deg,#A47CF3,#683FEA);
          box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.4),
          inset 0px -4px 0px 0px rgba(0, 0, 0, 0.2),
          0px 0px 0px 4px rgba(255, 255, 255, 0.2),
          0px 0px 180px 0px #9917FF;
          transform: translateY(-2px);
        }

        .btn:hover .text {
          color: white;
        }

        .btn:hover .sparkle {
          fill: white;
          transform: scale(1.2);
        } 

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    
</head>

<body>
    {{-- <script src="{{ asset('assets/js/custom/html2canvas.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/html2canvas.min.js') }}"></script> --}}

    {{-- <button class="btn-download" id="printCerti">Capture</button> --}}

    {{ $slot }}

    {{-- <button onclick="doCapture()">Capture</button> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
