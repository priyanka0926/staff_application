<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-4">
			<h1 class="text-center">Staff Details</h1>
       </div>	
    </div>	
	<div class="row">
		<div class="col-md-12 mt-4">
           <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
               Add Records
            </button>

<!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">

						    <div class="form-group">
                               <label>Name</label>
                                <input type="text" name="name" id="name" value=" " class="form-control">
                             </div>
                            <form action=" " id="form" method="post">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" value=" " class="form-control">
                                  </div>
                                <div class="form-group">
                                     <label>Phone</label>
                                     <input type="text" name="phone" id="phone" value=" " class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" id="image" value=" " class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                     <textarea name="description" id="description" value=" " class="form-control"> </textarea>
                                 </div>
                                <!---<div class="form-group">
                                    <label>Date Of Birth</label>
                                     <input type="Date" name="dob" id="dob" value=" " class="form-control">
                                 </div>--->

                                <div class="form-group">
                                     <label>Age</label>
                                    <input type="int" name="age" id="age" value=" " class="form-control">
                                </div>
                             </form>

         
                         </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add" name="add">Add</button>
                        </div>
                    </div>
                 </div>
             </div>

         </div>	
    </div>	
	    <div class="row">
            <div class="col-md-12 mt-3">
			 <table class="table table-striped">
                <thead>
                 <tr>
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone NO</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                   <!--- <th>Edit</th>
                    <th>Delete</th>   ----->
                 </tr>
                </thead>

                 <tbody id="tbody">

                 </tbody>

             </table>
            </div>		
        </div>			  	
</div>	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
	<script>
		$(document).on("click","#add", function(e){
			e.preventDefault();
			var name = $("#name").val();
			var email = $("#email").val();
			//var dob = $("#dob").val();
			//var password = $("#password").val();
			//var description = $("#description").val();
			var phone = $("#phone").val();
			 
			 $.ajax({
                url:"<?php echo base_url();?>insert",
			    type:"post",
				dataType:"json",
			    data:{
				    name:name,
					email:email,
					
					phone: phone,
			        },
				    success: function(data){
					console.log(data);
				   }	


			   });

			   $("#form")[0].reset();
		});

        </script>

<script type="text/javascript" language="javascript">  
  
  $(document).ready(function() {
		
			$.ajax ({
                 url:"<?php echo base_url(); ?>fetch",
				 type:"POST",
				 dataType:"json",
                 cache:false,
				 success: function(data){
					console.log(data); 
                    var tbody =" ";
                     for(var key in data)
                     {
                        tbody += "<tr>";
                       
                        tbody += "<td>" + data[key]["name"]+"</td>";
                        tbody += "<td>" + data[key]["email"]+"</td>";
                        tbody += "<td>" + data[key]["phone"]+"</td>";
                        tbody += "<td>" + data[key]["password"]+"</td>";
                        tbody += "<td>" + data[key]["description"]+"</td>";

                        tbody += "<td>" + data[key]["dob"]+"</td>";
                        tbody += "<td>" + data[key]["age"]+"</td>";
                      
                        tbody += "</tr>";
                     }
                     $("#tbody").html(tbody);
				 }
				
                })
            });
           // }
      //  fetch();

        </script>
	
</body>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  

</html>