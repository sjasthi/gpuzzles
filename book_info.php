<?php

require 'bin/functions.php';
require 'db_configuration.php';
$id = $_GET['id'];
$query = "SELECT book_name FROM books WHERE id = $id  INNER JOIN gpuzzles";
//TODO - need to make a page to select the data of a single book 
//for PDF creation of all assigned books
$GLOBALS['data'] = mysqli_query($db, $query);
// $GLOBALS['topic'] = mysqli_query($db, $query);
// $GLOBALS['puzzle'] = mysqli_query($db, $query);
// $GLOBALS['choice_1'] = mysqli_query($db, $query);
// $GLOBALS['choice_2'] = mysqli_query($db, $query);
// $GLOBALS['choice_3'] = mysqli_query($db, $query);
// $GLOBALS['choice_4'] = mysqli_query($db, $query);
// $GLOBALS['answer'] = mysqli_query($db, $query);
// $GLOBALS['puzzle_image'] = mysqli_query($db, $query);
?>

<?php $page_title = 'Books Info'; ?>
<?php include('nav.php'); 
    $page="book_info.php";
?>

<style>
	#title {
	text-align: center;
	color: darkgoldenrod;
	}
	thead input {
	width: 100%;
	}
	.thumbnailSize{
	height: 100px;
	width: 100px;
	transition:transform 0.25s ease;
	}
	.thumbnailSize:hover {
	-webkit-transform:scale(3.5);
	transform:scale(3.5);
	}
</style>

<!-- Page Content -->
<br><br>


		<h2 id="title">book List</h2><br>

			<div id="customerTableView">
				<button><a class="btn btn-sm" href="createBook.php">Create a Book</a></button>
				<table class="display" id="ceremoniesTable" style="width:100%">
					<div class="table responsive">
						<thead>
							<tr>
								<!-- <th>ID</th>
                    <th>Name</th>
                    <th>Creator</th> -->
								<th>Author</th>
								<th>Book</th>
								<th>Modify</th>
								<th>Delete</th>

								<!-- <th>Delete</th> -->
							</tr>
							<tr>
								<th> Puzzles!</th>

							</thead>
							<tbody>
								<?php
                // fetch the data from $_GLOBALS
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        echo '<tr>

                                <td>'.$row["author_name"].'</td>
                                <td>'.$row["book_name"].' </span> </td>
                                <td><a class="btn btn-warning btn-sm" href="modifyBook.php?id='.$row["id"].'">Modify</a></td>
                                <td><a class="btn btn-danger btn-sm" href="deleteBook.php?id='.$row["id"].'">Delete</a></td>
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
							</tbody>
						</div>
					</table>
				</div>
			</div>

			<!-- /.container -->
			<!-- Footer -->
			<footer class="page-footer text-center">
				<p>Cougars - Gpuzzles - ICS 499</p>
			</footer>

			<!--JQuery-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

			<!--Data Table-->
			<script type="text/javascript" charset="utf8"
					src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
			<script type="text/javascript" charset="utf8"
					src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

			<script type="text/javascript" language="javascript">
				$(document).ready( function () {

				$('#ceremoniesTable').DataTable( {
				dom: 'lfrtBip',
				buttons: [
				'copy', 'excel', 'csv', 'pdf'
				] }
				);

				$('#ceremoniesTable thead tr').clone(true).appendTo( '#ceremoniesTable thead' );
				$('#ceremoniesTable thead tr:eq(1) th').each( function (i) {
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );

				$( 'input', this ).on( 'keyup change', function () {
				if ( table.column(i).search() !== this.value ) {
				table
				.column(i)
				.search( this.value )
				.draw();
				}
				} );
				} );

				var table = $('#ceremoniesTable').DataTable( {
				orderCellsTop: true,
				fixedHeader: true,
				retrieve: true
				} );

				} );

			</script>
		</body>
	</html>