<div class="col-md-4">
    <div class="card" style="margin-bottom: 24px;">
        <iframe id="adMap" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="card-body p-4">
            <p class="text-primary card-text mb-0">Ad</p>
            <h4 id="adTitle" class="card-title"></h4>
            <p id="adDescription" class="card-text"></p>
        </div>
    </div>
</div>

<script>
    // Fetch the JSON file
    fetch('/ads.json')
        .then(response => response.json())
        .then(ads => {
            // Randomly pick an ad
            const randomAd = ads[Math.floor(Math.random() * ads.length)];

            // Update the iframe source
            document.getElementById('adMap').src = randomAd.map_src;

            // Update title and description
            document.getElementById('adTitle').textContent = randomAd.name;
            document.getElementById('adDescription').textContent = randomAd.description;
        })
        .catch(error => console.error('Error fetching ads:', error));
</script>