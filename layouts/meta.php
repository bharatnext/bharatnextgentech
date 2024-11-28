<?php
// Default values (fallback for pages without specific meta data)
$default_title = "BharatNextGenTech | Innovative Mobile & App Development Services";
$default_description = "BharatNextGenTech provides cutting-edge mobile app development and software solutions for scalable and innovative digital growth.";
$default_keywords = "custom app development, enterprise software, scalable digital solutions, tech consulting";
$default_image = "images/bg/banner.jpeg";

// Use page-specific variables if set, otherwise fallback to default
$page_title = isset($meta_title) ? $meta_title : $default_title;
$page_description = isset($meta_description) ? $meta_description : $default_description;
$page_keywords = isset($meta_keywords) ? $meta_keywords : $default_keywords;
$page_image = isset($meta_image) ? $meta_image : $default_image;
$page_url = isset($meta_url) ? $meta_url : "https://bharatnextgentech.com" . $_SERVER['REQUEST_URI'];
?>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="author" content="BharatNextGenTech">
<meta name="generator" content="BharatNextGenTech Software & Website Development Services">

<meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
<meta property="og:type" content="website">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">
<title><?php echo htmlspecialchars($page_title); ?></title>

<?php
$canonical_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<link rel="canonical" href="<?php echo $canonical_url; ?>" />