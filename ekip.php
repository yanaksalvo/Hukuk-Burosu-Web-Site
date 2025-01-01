<?php
include 'includes/config.php';
include 'includes/header.php';

// Fetch team members ordered by order_number
$query = "SELECT * FROM team_members ORDER BY order_number ASC";
$team_members = $conn->query($query);
?>

<!-- Team Section -->
<div class="page-header text-white" style="background-color: #01346b;">
    <div class="container">
        <h1 class="text-center m-0 py-3">Ekibimiz</h1>
    </div>
</div>

<section class="team-section py-5">
    <div class="container">
        <div class="row g-4">
            <?php while($member = $team_members->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="team-member">
                    <div class="member-image">
                        <img src="uploads/team/<?php echo $member['image']; ?>" 
                             alt="<?php echo htmlspecialchars($member['name']); ?>" 
                             class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h3><?php echo htmlspecialchars($member['name']); ?></h3>
                        <h5><?php echo htmlspecialchars($member['title']); ?></h5>
                        <p><?php echo htmlspecialchars($member['description']); ?></p>
                        <div class="member-social">
                            <?php if($member['email']): ?>
                            <a href="mailto:<?php echo $member['email']; ?>" class="social-link">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <?php endif; ?>
                            <?php if($member['linkedin']): ?>
                            <a href="<?php echo $member['linkedin']; ?>" class="social-link" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<style>
.team-member {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.team-member:hover {
    transform: translateY(-5px);
}

.member-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.member-info {
    padding: 1.5rem;
    text-align: center;
}

.member-info h3 {
    color: #002e5b;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.member-info h5 {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.member-info p {
    color: #777;
    margin-bottom: 1rem;
}

.member-social {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    color: #002e5b;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #002e5b;
    color: #fff;
}

@media (max-width: 768px) {
    .member-image img {
        height: 250px;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
