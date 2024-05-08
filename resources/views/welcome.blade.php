<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Knowledge Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Use only one Bootstrap version -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
  <body>
    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a href="#">Knowledge Portal </a></h2>
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" id="hamburger-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </label>
        <ul class="links">
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="buttons">
          <a href="{{route('login')}}" class="signin">Sign In</a>
          <a href="{{route('register')}}" class="signup">Sign Up</a>
        </div>
      </nav>
    </header>
    <section class="hero-section">
      <div class="hero">
        <h3>Knowledge Portal Development</h3>
        <p>
          Join us in the exciting world of programming and turn your ideas into
          reality. Unlock the world of endless possibilities - learn to code and
          shape the digital future with us.
        </p>
        <div class="buttons">
          <a href="#" class="join">Join Now</a>
          <a href="#" class="learn">Learn More</a>
        </div>
      </div>
      <div class="img">
        <img src="https://www.codingnepalweb.com/demos/create-responsive-website-html-css/hero-bg.png" alt="hero image" />
      </div>
    </section>
    <section class="article">
        <div class="container-fluid">
            <h3 class="fb-heading">article categories</h3>
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="searchbar">
                        <input id="search_input" class="search_input" type="text" name="" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </div>

    <div id="search_results">
        <!-- Search results will be displayed here -->
    </div>
        <div class="row come-in">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" id="fat-heading-abb">
                        <a href=""><i class="fa fa-folder"></i><strong>General </strong><span class="cat-count">(4)</span></a>
                    </div>
                    <div class="panel-body">
                        <p>"The lives of three men are in question, sir," said Phileas Fogg.</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" id="fat-heading-abb">
                        <a href=""><i class="fa fa-folder"></i><strong>FAQ's </strong><span class="cat-count">(4)</span></a>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($faqs as $faq): ?>
                            <a href="" class="text-dark"><i class="fas fa-file-alt"></i> <strong class="decor"><?= $faq->question ?></strong></a>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" id="fat-heading-abb">
                        <a href="#"><i class="fa fa-folder"></i><strong>Files </strong><span class="cat-count">(4)</span></a>
                    </div>
                    <div class="panel-body">
                        @foreach ($files as $file)
                        <?php
                        $fileName = $file->name;
                        $fileParts = pathinfo($fileName);
                        $shortName = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        ?>
                        <p><i class="fas fa-file-alt"></i><a href="{{ asset($file->path) }}" download="{{ $fileName }}" class="text-dark">{{ $shortName . '.' . $fileParts['extension'] }}</a></p>
                        @endforeach
                    </div>
                </div>
        </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading" id="fat-heading-abb"><strong>Article</strong></div>
                    <?php foreach ($allArticles as $article): ?>
                    <p><i class="fa fa-folder"></i> <strong class="decor"><?= $article->title ?></strong></p>
                    <div class="panel-body">
                        <p>
                            <i class="fas fa-file-alt"></i>
                            <?= substr($article->short_text, 0, 50) ?>
                            <?php if (strlen($article->short_text) > 50): ?>
                            <a href="#" class="read-more">Read More</a>
                            <?php endif; ?>
                        </p>
                        <div class="full-text" style="display: none;"><?= $article->full_text ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="support-container">
                    <h2 class="support-heading">Need More Support?</h2>
                    <p>If you cannot find the answer in the knowledgebase, you can <a href="">contact us</a></p>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading"><strong>Latest Article</strong></div>
                    <?php foreach ($latestArticles as $article): ?>
                    <p><i class="fa fa-folder"></i> <strong class="decor"><?= $article->title ?></strong></p>
                    <div class="panel-body">
                        <p>
                            <i class="fas fa-file-alt"></i>
                            <?= substr($article->short_text, 0, 50) ?>
                            <?php if (strlen($article->short_text) > 50): ?>
                            <a href="#" class="read-more">Read More</a>
                            <?php endif; ?>
                        </p>
                        <div class="full-text" style="display: none;"><?= $article->full_text ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // jQuery for Read More functionality
    $(document).ready(function() {
        $(".read-more").click(function() {
            $(this).prev('.full-text').slideToggle();
            return false;
        });
    });
</script>

    <script>
        // Fetch search results and update view
        const searchInput = document.getElementById('search_input');
        const searchResultsContainer = document.getElementById('search_results');

        searchInput.addEventListener('input', function() {
            const query = this.value.trim();

            if (query.length === 0) {
                searchResultsContainer.innerHTML = ''; // Clear results if query is empty
                return;
            }

            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Update view with search results
                    const resultsHTML = `
                        <h2>Articles</h2>
                        <ul>
                            ${data.articles.map(article => `<li>${article.title}</li>`).join('')}
                        </ul>
                        <h2>Categories</h2>
                        <ul>
                            ${data.categories.map(category => `<li>${category.name}</li>`).join('')}
                        </ul>
                        <h2>Knowledge Base</h2>
                        <ul>
                            ${data.knowledgeBase.map(kb => `<li>${kb.title}</li>`).join('')}
                        </ul>
                        <h2>File Uploads</h2>
                        <ul>
                            ${data.fileUploads.map(file => `<li>${file.name}</li>`).join('')}
                        </ul>
                    `;
                    searchResultsContainer.innerHTML = resultsHTML;
                })
                .catch(error => console.error('Error fetching search results:', error));
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
