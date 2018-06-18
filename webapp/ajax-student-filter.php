<?php session_start();
include "config.php";
$id=$_REQUEST['id'];
$user_id=$_SESSION['adminuserid'];

/* $stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN `users` ON users.id = si.user_id
LEFT JOIN classes on classes.id = si.class_name
LEFT JOIN section on section.id = si.class_section_name
LEFT JOIN class_section as cs on cs.id = si.class_name
where school_id=$user_id and users.delete_status=1"; */

if($id != 0){
    $stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN classes on classes.id = si.class_name
LEFT JOIN section on section.id = si.class_section_name
LEFT JOIN class_section as cs on cs.class_id = classes.id and cs.section_id = section.id
where cs.id = $id";
}
else{
    $stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN `users` ON users.id = si.user_id
where school_id=$user_id and users.delete_status=1";
}
$stu_exe=mysql_query($stu_sql);
$stu_cnt=@mysql_num_rows($stu_exe);
?>

<table class="table datatable">
    <thead>
    <tr>
        <th><input type="checkbox" onClick="toggle(this)" /> Select All</th>
        <th>NAME</th>
        <th>PHONE NUMBER</th>
        <th>TODAY ATTENDANCE</th>
        <th class="text-center">ACTIONS</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($stu_fet=mysql_fetch_array($stu_exe))
    {
        ?>
        <tr>
            <td><input type="checkbox" class="stuCheck" name="student[]" value="<?php echo $stu_fet['user_id'] ?>"/> </td>
            <td><?php echo $stu_fet['firstname_person'] . " " . $stu_fet['lastname_person']; ?></td>
            <td><?php echo $stu_fet['mobile'] ?></td>
            <td>N/A </td>
            <td class="text-center">
                <ul class="icons-list">
                    <li><a href="student-view.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a></li>&nbsp;&nbsp;
                    <li><a href="student-edit.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a></li>&nbsp;&nbsp;
                    <li><a href="student-delete.php?student_id=<?php echo $stu_fet['user_id']; ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-remove"></i></button></a></li>&nbsp;&nbsp;
                </ul>
            </td>
            <td><a href="sms.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info">Send SMS</button></a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<script>
    $("#myBtn").click(function(){
        var staff = [];
        $.each($(".stuCheck:checked"), function(){
            staff.push($(this).val());
        });
        var staf = staff.join(", ");
        //alert(staf);
        $(".studId").val(staf);
    });
</script>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    function toggle(source) {
        checkboxes = document.getElementsByName('student[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $(function() {
            $('.styled').uniform();
        });
        $(function() {

            // DataTable setup
            $('.datatable').DataTable({
                autoWidth: false,
                columnDefs: [
                    {
                        width: '15%',
                        targets: 0
                    },
                    {
                        width: '25%',
                        targets: 1
                    },
                    {
                        width: '20%',
                        targets: [2,3]
                    },
                    {
                        orderable: false,
                        width: '20%',
                        targets: [4, 5]
                    }
                ],
                order: [[ 0, 'desc' ]],
                dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Search:</span> _INPUT_',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                displayLength: 100
            });

            $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity,
                width: '60px'
            });
        });
    });
</script>