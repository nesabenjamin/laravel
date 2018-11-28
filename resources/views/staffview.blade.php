<!DOCTYPE html>
<html>
<head>
	<title>Staff View</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script>
        $('#myModal').modal({ show: false})
        function loadIframe(url) {
            //alert(url);
            var $iframe = $('#' + 'iframeM');
            if ( $iframe.length ) {
                $iframe.attr('src',url+'#view=FitH');    // here you can change src
                $('#myModal').modal('show');
                return false;
            }
            return true;

        }


        function getApplication(id){
            //$("#applicationHTML").html('');
            $("#approvalHTML").html('');
			$.ajax({
				type:'get',
				url:'http://localhost:8000/getHTML'+"?ID=" + id,
				// url: my_site + "getData?myData=" + myData;
				success:function(data){
					//alert(data.html);
					$("#applicationHTML").html(data.application);
				}
			});
        }
        function getApprovement(id){
            $("#applicationHTML").html('');
            $("#approvalHTML").html();
            $.ajax({
                type:'get',
                url:'http://localhost:8000/getApproval'+"?ID=" + id,
                // url: my_site + "getData?myData=" + myData;
                success:function(data){
                    //alert(data.html);
                    $("#approvalHTML").html(data.Approvement);
                }
            });
        }
	</script>



</head>
<body>
<div class="container">
{{--	<iframe src="{{asset('storage/WEB4.pdf')}}"
			width='400'
			height='300'
			></iframe >
	<br><br>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		Open modal
	</button>--}}

	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Modal Heading</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="iframeM"
								class="embed-responsive-item"
								src=""
								>

							<p ><em><strong>ERROR: </strong>
									An &#105;frame should be displayed here but your browser version does not support &#105;frames. </em>Please update your browser to its most recent version and try again.</p>
						</iframe>
					</div>

					{{--<iframe src="{{asset('storage/WEB4.pdf')}}"
							width='700'
							height='500'
					></iframe >--}}
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>


{{--
	view on ajax call:
https://stackoverflow.com/questions/38761950/how-to-add-include-views-in-laravel-using-ajax
https://stackoverflow.com/questions/21753954/how-to-include-a-sub-view-in-blade-templates

{{ print_r($forma)}}
{{ print_r($companies)}}

	@if($htmlcode)

	@else
		No Rendering
	@endif

	@isset($html)
		{{print_r($html)}}
	@endisset
--}}

	<table class="table table-sm table-bordered table-hover m-0">
		<tbody>
		<tr class="text-center ">
			<td width="4%">ID</td>
			<th width="35%"> Company Name</th>
			<th width="30%">Application Type</th>
			<th width="30%">View</th>
		</tr>
		@foreach ($forma as $a)
			<tr>

				<td>{{ $a->aid }}</td>
				<td>{{ $a->companyName }}</td>
				<td>{{ $a->applicationType}}</td>
				<td><button onclick="getApplication({{$a->aid}})">View me</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>

{{--	{{ print_r($forma)}}--}}
<br><br>
	<div id="applicationHTML">	</div>

	<div id="approvalHTML" class="collapse">
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>