<!DOCTYPE html>
<head>
    <title>Staff View</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>

<table class="table table-sm table-bordered table-hover m-0">
    <tbody >

    <tr >
        <td width="4%"></td>
        <td width="50%">Application for Fresh / Renewal</td>
        <td >{{$forma->applicationType }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td >Name of the applicant</td>
        <td  >{{$forma->companyName }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td colspan="2">
            Whether a company registered under Companies Act or a partnership firm or any other legal entity <br>(Article of partnership/ company to be attached)
        </td>
    </tr>
    <tr>
        <td></td>
        <td>{{$forma->registeredType }}</td>
        <td >
            <button class="btn">File</button>
        </td>

    </tr>

    <tr>
        <td >5</td>
        <td colspan="2">Names of the Steamship Company / Charterer of Ships / Owner of Cargo with whom the contract for stevedoring their vessel / cargo subsists or is proposed to be entered <br>
            (Proof of contract for the period covered is to be appended. The approximate tonnage for each party is to be indicated)</td>
    </tr>
    </tbody>
</table>

<table class="table table-sm table-bordered table-hover m-0">
    <tbody>
    <tr class="text-center ">
        <td width="4%"></td>
        <th width="35%"> Name</th>
        <th width="30%">Stramship Company/<br>Charterer of Ships/<br>Owner of cargo</th>
        <th width="30%">Documents</th>
    </tr>
    @foreach ($companies as $company)
        <tr>
            <td></td>
            <td>{{ $company->appID }}</td>
            <td>{{ $company->companyName }}</td>
            <td>
                <button
                    onclick="loadIframe('{{ asset('storage/'.$company->fileName) }}')"
                        class="btn " >
                    {{ $company->fileName}}
                </button>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br><br><br><br>

<table class="table table-sm table-bordered table-hover m-0">
    <tbody >
    <tr>
        <td><a href="pdf" class="btn btn-primary btn-outline-primary" >DownLoad Application</a></td>
        <td ><button >Dowwnload Documents</button>

        </td>
        <td ><button onclick="getApprovement({{$forma->aid}})"
                     class="btn btn-primary"
                     data-toggle="collapse"
                     data-target="#approvalHTML">Approvement</button></td>
    </tr>
    </tbody>
</table>
<br><br><br><br>

</body>
</html>