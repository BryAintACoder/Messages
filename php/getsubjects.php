<?php
// Include database connection
include('connection/dbconfig.php');

// Initialize search variables
$search = "";
if(isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Check if "View All" button is clicked
if(isset($_GET['view_all'])) {
    // Reset search variable
    $search = "";
}

// SQL query to fetch subjects
$sql = "SELECT * FROM subjects";

// Add search condition if search term is provided
if(!empty($search)) {
    $sql .= " WHERE subject_name LIKE '%$search%'";
}

$result = $conn->query($sql);

// Display search form
echo '<form action="" method="GET">';
echo '<input type="text" name="search" placeholder="Search by subject name" value="' . $search . '">';
echo '<button type="submit">Search</button>';
echo '<a href="?view_all" class="btn btn-primary ml-2">View All</a>';
echo '</form>';

// Display subjects in a table
if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead><tr><th>Subject Name</th><th>Action</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['subject_name'] . '</td>';
    
        echo '<td>';
        // Form for deleting subject
        echo '<form action="deletesubject.php" method="POST">';
        echo '<input type="hidden" name="subjectId" value="' . $row['id'] . '">';
        echo '<button type="submit" name="deleteSubject" class="btn btn-danger ml-2">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No subjects found";
}

// Close connection
$conn->close();
?>
