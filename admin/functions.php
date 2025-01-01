<?php
function logActivity($conn, $description, $type, $color = 'text-primary') {
    $description = $conn->real_escape_string($description);
    $type = $conn->real_escape_string($type);
    $color = $conn->real_escape_string($color);
   
    $query = "INSERT INTO activities (description, activity_type, color) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $description, $type, $color);
    $stmt->execute();
}

function getActivityIcon($type) {
    $icons = [
        'blog' => 'fa-blog',
        'testimonial' => 'fa-comment',
        'team' => 'fa-users',
        'service' => 'fa-briefcase',
        'settings' => 'fa-cog',
        'login' => 'fa-sign-in-alt',
        'logout' => 'fa-sign-out-alt'
    ];
    
    return isset($icons[$type]) ? $icons[$type] : 'fa-info-circle';
}

function formatDate($date) {
    return date('d.m.Y H:i', strtotime($date));
}
