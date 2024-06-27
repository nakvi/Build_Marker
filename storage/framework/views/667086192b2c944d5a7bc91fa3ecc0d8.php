<!DOCTYPE html>
<html>
<head>
    <title>New Project Assignment</title>
</head>
<body>
    <h1>Dear <?php echo e($foremanName); ?>,</h1>
    <p>You have been added as a foreman to the project: <?php echo e($projectName); ?>.</p>
    <p> Project Address :<?php echo e($projectAddress); ?></p>
    <p>Thank you!</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\build_marker\resources\views/emails/foreman_added_to_project.blade.php ENDPATH**/ ?>