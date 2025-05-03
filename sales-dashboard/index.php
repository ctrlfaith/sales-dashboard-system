<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sales Dashboard powered by Looker Studio">
  <title>Sales Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
      color: #333;
      margin: 0;
    }
    .container {
      padding: 2rem;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }
    .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: box-shadow;
    }
    .card:hover {
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      outline: 1px solid rgba(0, 123, 255, 0.2);
    }
    .iframe-container {
      position: relative;
      width: 100%;
      height: calc(100vh - 200px);
      min-height: 400px;
      border-radius: 8px;
    }
    .iframe-container iframe {
      width: 100%;
      height: 100%;
      border: none;
      display: block;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
      transform: translateY(-2px);
    }
    .btn-secondary {
      transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }
    .btn-secondary:hover {
      background-color: #5a6268;
      border-color: #545b62;
      transform: translateY(-2px);
    }
    .spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
      opacity: 0.8;
    }
    .progress-bar-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: #e2e8f0;
      z-index: 10;
      opacity: 1;
      transition: opacity 0.5s ease-in-out;
    }
    .progress-bar {
      width: 0;
      height: 100%;
      background-color: #007bff;
      animation: progress 2.5s ease-in-out forwards;
    }
    .progress-bar-container.hidden {
      opacity: 0;
    }
    @keyframes progress {
      0% { width: 0; }
      100% { width: 100%; }
    }
    @media (max-width: 576px) {
      .container {
        padding: 1rem;
      }
      .header {
        flex-direction: column;
        align-items: flex-start;
      }
      .button-group {
        flex-direction: column;
        width: 100%;
        margin-top: 1rem;
      }
      .btn {
        width: 100%;
        margin-bottom: 10px;
      }
      .iframe-container {
        height: calc(100vh - 250px);
        min-height: 300px;
      }
      .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        outline: none;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div>
        <h2 class="mb-2">Sales Dashboard</h2>
        <p class="text-muted">This dashboard displays an analysis of sales data powered by Looker Studio</p>
      </div>
      <div class="button-group d-flex gap-3">
        <a href="add-sale.php" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a new sale record">
          <i class="bi bi-plus-circle me-2"></i>Add Sale
        </a>
        <a href="view-sales.php" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="View all sales records">View All</a>
      </div>
    </div>

    <div class="card shadow-sm mb-4">
      <div class="iframe-container">
        <div class="progress-bar-container" id="progressBar">
          <div class="progress-bar"></div>
        </div>
        <div class="spinner" id="spinner">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <iframe 
          src="https://lookerstudio.google.com/embed/reporting/aaf0aec5-d455-4d26-9381-7b9163837aa3/page/oV8IF" 
          frameborder="0" 
          scrolling="no"
          allowfullscreen
          onload="hideLoadingIndicators()"
          sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
        </iframe>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    function hideLoadingIndicators() {
      const progressBar = document.getElementById('progressBar');
      progressBar.classList.add('hidden');
      document.getElementById('spinner').style.display = 'none';
    }
  </script>
</body>
</html>