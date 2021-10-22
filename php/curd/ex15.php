
<!--index.html///https://www.webslesson.info/2021/06/ajax-pagination-using-php-with-javascript.html-->

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script>
    function load_data(query = '', page_number = 1)
    {
        var form_data = new FormData();
    
        form_data.append('query', query);
    
        form_data.append('page', page_number);
    
        var ajax_request = new XMLHttpRequest();
    
        ajax_request.open('POST', 'process_data.php');
    
        ajax_request.send(form_data);
    
        ajax_request.onreadystatechange = function()
        {
            if(ajax_request.readyState == 4 && ajax_request.status == 200)
            {
                var response = JSON.parse(ajax_request.responseText);
    
                var html = '';
    
                var serial_no = 1;
    
                if(response.data.length > 0)
                {
                    for(var count = 0; count < response.data.length; count++)
                    {
                        html += '<tr>';
                        html += '<td>'+response.data[count].id+'</td>';
                        html += '<td>'+response.data[count].name+'</td>';
                        html += '<td>'+response.data[count].make+'</td>';
                        html += '</tr>';
                        serial_no++;
                    }
                }
                else
                {
                    html += '<tr><td colspan="3" class="text-center">No Data Found</td></tr>';
                }
    
                document.getElementById('post_data').innerHTML = html;
    
                document.getElementById('total_data').innerHTML = response.total_data;
    
                document.getElementById('pagination_link').innerHTML = response.pagination;
    
            }
    
        }
    }
    </script>

    <div class="container">
    	<h2 class="text-center mt-4 mb-4"> </h2>
    	
    	<div class="card">
    		<div class="card-header">
    			<div class="row">
    				<div class="col-md-6">Sample Data</div>
    				<div class="col-md-3 text-right"><b>Total Data - <span id="total_data"></span></b></div>
    				<div class="col-md-3">
    					<input type="text" name="search" class="form-control" id="search" placeholder="Search Here" onkeyup="load_data(this.value);" />
    				</div>
    			</div>
    		</div>
    		<div class="card-body">
    			<table class="table table-bordered">
    				<thead>
    					<tr>
    						<th width="5%">#</th>
    						<th width="35%">Name</th>
    						<th width="60%">Make</th>
    					</tr>
    				</thead>
    				<tbody id="post_data"></tbody>
    			</table>
    			<div id="pagination_link"></div>
    		</div>
    	</div>
    	
    </div>
</body>
</html>
