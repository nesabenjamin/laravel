<!DOCTYPE html>
<html>
<head>
    <title>Staff View</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>
        function getHTML(id){

            // var id = prompt("Please enter your ID");
            // if (id != null) {
            // }
            $.ajax({
                type:'get',
                url:'http://localhost:8000/getHTML'+"?ID=" + id,
                // url: my_site + "getData?myData=" + myData;
                success:function(data){
                    //alert(data.html);
                    $("#msg").html(data.html);
                }
            });







        }
    </script>



</head>
<body>
<div class="container">
    <br><br>

{{--@if($forma)
    {{ print_r($forma)}}
@else
    No Rendering
@endif--}}


<table class="table table-sm table-bordered table-hover m-0">
    <thead>
    <tr>
        <th></th>
        <th>License Content</th>
        <th></th>
    </tr>
    </thead>

    <tbody >

    <tr>
        <td>1</td>
        <td >Name of the applicant</td>
        <td  colspan="3">{{$forma->companyName }}</td>
    </tr>
    <tr >
        <td width="4%">2</td>
        <td width="50%">Application for Fresh / Renewal</td>
        <td colspan="3">{{$forma->applicationType }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td > Company registered Type </td>
        <td>{{$forma->registeredType }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td > Applied Date</td>
        <td >  </td>

    </tr>
    <tr>
        <td>5</td>
        <td > Validity </td>
        <td ></td>

    </tr>
    <tr>
        <td>6</td>
        <td > Generated License </td>
        <td > <button >View</button></td>

    </tr>

    </tbody>
</table>
    <br><br><br><br>

    <table class="table table-sm table-bordered table-hover m-0">
        <tbody >
            <tr>
                <td><button >Generate License</button></td>
                <td ><button >Send Mail</button></td>
            </tr>
        </tbody>
    </table>


</div>
</body>
</html>