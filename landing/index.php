<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="landing.css">
    <title>Hamro Mart</title>
</head>
<body>

    <?php

        include '../navbar/navbar.php';
    
    ?>

    <div class="container">

        <div class="landing-container">

            <div class="text-container">
            
                <h1>THE QUALITY YOU DESERVE</h1>
                <p>Hamro-Mart provides you with hand-selected products <br>
                    so you can shop without worring about what you’re getting.
                </p>

                <a href="../products/products.php" class="shop-btn">Start Shopping</a>
            
            </div>

        </div>


        <div class="steps-container">
        
            <h2 class="container-title">How it works...</h2>

            <div class="steps-showcase">

                <div class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/></svg>
                    <h3 class="step-title">Save the Proucts</h3>

                    <p class="step-description">
                        Our website allows you to select and save all the products you wish to order in a nice little basket
                    </p>
                </div>

                <div class="step">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.854 13.683l1.998.159c-.132.854-.351 1.676-.652 2.46l-1.8-.905c.2-.551.353-1.123.454-1.714zm-2.548 7.826l-1.413-1.443c-.486.356-1.006.668-1.555.933l.669 1.899c.821-.377 1.591-.844 2.299-1.389zm1.226-4.309c-.335.546-.719 1.057-1.149 1.528l1.404 1.433c.583-.627 1.099-1.316 1.539-2.058l-1.794-.903zm-20.532-5.2c0 6.627 5.375 12 12.004 12 1.081 0 2.124-.156 3.12-.424l-.665-1.894c-.787.2-1.607.318-2.455.318-5.516 0-10.003-4.486-10.003-10s4.487-10 10.003-10c2.235 0 4.293.744 5.959 1.989l-2.05 2.049 7.015 1.354-1.355-7.013-2.184 2.183c-2.036-1.598-4.595-2.562-7.385-2.562-6.629 0-12.004 5.373-12.004 12zm23.773-2.359h-2.076c.163.661.261 1.344.288 2.047l2.015.161c-.01-.755-.085-1.494-.227-2.208zm-9.005 5.359v-1.419h-2.594v-1.295l2.722-3.653h1.288v3.689h.816v1.259h-.815v1.419h-1.417zm0-2.679v-1.695l-1.263 1.695h1.263zm-7.768 2.679c0-.961.275-1.709 1.234-2.419 1.129-.836 1.99-1.165 1.99-1.939 0-.512-.308-.83-.804-.83-.69 0-.855.723-.855 1.411h-1.421c-.06-1.782.951-2.713 2.338-2.713 1.287 0 2.22.856 2.22 2.036 0 .589-.183 1.056-.576 1.469-.621.655-1.552.985-2.163 1.682h2.774v1.303h-4.737z"/></svg>
                    <h3 class="step-title">Select a Collection Slot</h3>

                    <p class="step-description">
                        When ordering the products, we give you collection options after 24 hours of the order.
                    </p>
                </div>

                <div class="step">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M5 23h-2v-10l8.991-8.005c1.124.998 2.25 1.997 3.378 2.996l2.255 1.997c1.127.999 2.252 2.013 3.376 3.012v10h-2v-9.118l-7.009-6.215-6.991 6.22v9.113zm2-2h10v2h-10v-2zm0-3h10v2h-10v-2zm10-3v2h-10v-2h10zm-5-14l12 10.632-1.328 1.493-10.672-9.481-10.672 9.481-1.328-1.493 12-10.632z"/></svg>
                    <h3 class="step-title">Come Pick it Up</h3>

                    <p class="step-description">
                        After the collection is done, you can come to the collection spot and pick up you orders.
                    </p>
                </div>

            </div>
        
        </div>

        <img src="../images/landing-image.png" alt="" class="landing-image">
    
    </div>

    <div class="traders-container">

        <section>

            <h2 class="container-title">Explore the different <br>Traders... </h2>

            <div class="traders-showcase">

                <div class="trader">
                    <a href="../products/products.php?product-type=butcher">
                        <svg height="24" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.48 425.48" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 425.48 425.48">
                            <g>
                                <path d="m414.221,100.116l-22.783-44.493c-1.656-3.235-3.58-6.275-5.717-9.124l4.675-14.217c2.156-6.558-1.412-13.623-7.97-15.779-6.558-2.157-13.623,1.413-15.779,7.97l-1.47,4.47c-0.832-0.44-1.674-0.864-2.529-1.268l.145-15.056c0.066-6.903-5.476-12.553-12.379-12.62-6.872-0.075-12.553,5.476-12.62,12.379l-.089,9.251c-0.826-0.026-1.651-0.032-2.476-0.025l-5.481-11.109c-3.055-6.19-10.548-8.732-16.741-5.678-6.191,3.055-8.733,10.55-5.678,16.741l2.763,5.599c-0.924,0.419-1.842,0.86-2.752,1.325-0.078,0.04-0.158,0.084-0.236,0.124l-9.48-6.839c-5.598-4.039-13.412-2.776-17.45,2.824-4.039,5.599-2.775,13.412 2.824,17.45l4.233,3.054c-16.288,18.827-49.686,44.913-95.627,61.821-37.114,13.659-93.92,25.206-153.79,2.639-3.105-1.17-6.55-1.058-9.573,0.313s-5.376,3.889-6.541,6.998c-17.351,46.312-15.541,96.57 5.099,141.517 20.637,44.942 57.584,79.07 104.035,96.099 7.011,2.57 14.114,4.688 21.274,6.377l30.673,39.619h-2.742c-6.903,0-12.5,5.596-12.5,12.5s5.597,12.5 12.5,12.5h54.691c6.904,0 12.5-5.596 12.5-12.5 0-6.903-5.596-12.5-12.5-12.5h-20.333l-26.987-34.859c2.172,0.078 4.344,0.127 6.516,0.127 26.593-0.001 53.149-5.851 78.073-17.479 44.892-20.945 78.816-57.977 95.522-104.274 1.356-3.759 2.603-7.597 3.706-11.406 9.463-32.667 6.019-65.426-9.585-93.739l46.72-21.7c3.083-1.432 5.449-4.057 6.554-7.271 1.105-3.211 0.855-6.736-0.695-9.761zm-70.216,135.395c-14.432,39.992-43.758,71.992-82.577,90.104-38.791,18.098-82.115,20.016-121.99,5.397-40.15-14.718-72.084-44.216-89.92-83.059-3.594-7.826-6.523-15.839-8.793-23.973 3.431,1.585 7.003,2.969 10.709,4.081 1.198,0.359 2.407,0.531 3.597,0.531 5.376,0 10.344-3.497 11.968-8.912 1.984-6.612-1.769-13.581-8.381-15.564-13.601-4.08-20.754-11.405-23.528-14.891-0.134-2.747-0.19-5.498-0.179-8.249 5.966,2.099 13.293,3.736 22.305,4.524 0.371,0.032 0.738,0.048 1.103,0.048 6.411,0 11.87-4.906 12.438-11.412 0.601-6.877-4.487-12.94-11.364-13.542-11.893-1.04-18.557-3.72-22.168-5.956 1.016-5.859 2.365-11.688 4.049-17.462 60.952,19.016 121.454,9.117 170.635-11.424 2.088,13.096 8.404,25.243 18.242,34.578 10.962,10.402 25.177,16.263 40.028,16.718 7.15,12.84 18.783,22.785 32.748,27.784 6.649,2.38 13.6,3.559 20.533,3.559 9.597,0 19.151-2.279 27.831-6.73-0.404,7.922-1.75,15.947-4.076,23.973-0.956,3.298-2.036,6.621-3.21,9.877zm-5.779-113.35c-3.379,1.569-5.881,4.564-6.826,8.168-0.944,3.604-0.232,7.441 1.942,10.466 7.496,10.427 12.69,21.854 15.53,33.853l-8.442,4.507c-9.07,4.847-19.397,5.607-29.079,2.141-9.689-3.469-17.193-10.617-21.115-20.092l-.71-1.73c-2.136-5.206-7.486-8.342-13.071-7.663-10.684,1.296-21.29-2.206-29.098-9.615-7.641-7.25-11.679-17.375-11.162-27.873 33.358-17.552 59.459-39.234 73.848-57.6 1.769-2.258 5.387-4.293 8.691-5.986 8.912-4.563 19.069-5.383 28.598-2.308s17.291,9.677 21.854,18.589l16.862,32.931-47.822,22.212z"/>
                                <path d="m337.942,59.989c-3.29,0-6.51,1.33-8.84,3.66-2.32,2.32-3.66,5.54-3.66,8.83s1.34,6.52 3.66,8.84c2.33,2.33 5.55,3.66 8.84,3.66s6.51-1.33 8.84-3.66c2.33-2.32 3.66-5.55 3.66-8.84s-1.33-6.51-3.66-8.83c-2.33-2.33-5.55-3.66-8.84-3.66z"/>
                            </g>
                        </svg>
                    </a>
                    <h3 class="trader-title">Butcher</h3>
                </div>

                <div class="trader">
                    <a href="../products/products.php?product-type=greengrocer">
                        <svg height="24" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;" xml:space="preserve">
                            <g>
                                <path d="M348.399,104.848c-1.257,0-2.489,0.022-3.707,0.066c-45.669,1.659-74.383,25.793-91.667,32.88
                                    c-4.223-22.172-5.759-69.433,40.609-116.225L271.891,0.006c-25.597,25.826-39.003,51.986-45.658,75.607
                                    C173.742,6.109,104.742,15.819,104.742,15.819c48.35,91.049,106.284,70.783,120.351,64.088
                                    c-4.731,18.899-5.271,36.013-4.053,49.641c-17.489-9.865-41.998-23.41-75.732-24.635c-1.215-0.044-2.454-0.066-3.708-0.066
                                    C87.663,104.846,0,146.111,0,267.252c0,123.954,99.709,222.741,150.78,222.741c51.07,0,68.821-14.472,94.22-14.472
                                    c25.399,0,43.149,14.472,94.22,14.472c51.07,0,150.78-98.787,150.78-222.741C490,146.119,402.337,104.848,348.399,104.848z
                                    M339.22,459.369c-25.901,0-41.088-4.088-55.775-8.041c-11.746-3.162-23.891-6.431-38.445-6.431c-14.554,0-26.7,3.269-38.446,6.431
                                    c-14.687,3.953-29.875,8.041-55.774,8.041c-29.042,0-120.155-79.717-120.155-192.116c0-45.085,13.554-79.987,40.288-103.736
                                    c23.276-20.677,51.776-28.045,70.688-28.044c0.878,0,1.746,0.016,2.595,0.047c26.826,0.974,46.696,12.186,62.66,21.195
                                    c13.104,7.395,24.421,13.781,38.144,13.781c13.723,0,25.04-6.386,38.143-13.781c15.965-9.009,35.834-20.221,62.659-21.195
                                    c0.853-0.031,1.716-0.047,2.596-0.047c18.911,0,47.41,7.368,70.688,28.047c26.733,23.75,40.289,58.65,40.289,103.732
                                    C459.375,379.652,368.262,459.369,339.22,459.369z"/>
                            </g>
                        </svg>
                    </a>
                    
                    <h3 class="trader-title">Greengrocer</h3>
                </div>

                <div class="trader">
                    <a href="../products/products.php?product-type=fishmonger">
                        <svg height="24" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <circle cx="382.425" cy="76.873" r="15.32"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M507.955,48.307l-2.887-12.639l-28.014-0.72l-0.72-28.014l-12.639-2.887c-30.661-7.003-73.918-4.824-115.713,5.827
                                        C316.85,17.808,274.012,33.68,234.923,65.13c-38.325,0.988-95.202,26.734-125.59,57.123c-8.174,8.174-12.167,18.625-11.548,30.226
                                        c0.806,15.114,9.614,32.138,26.178,50.599c3.253,3.626,6.479,6.937,9.445,9.842c-10.075,31.318-13.655,61.082-12.597,86.835
                                        c-45.114-3.278-95.008,13.067-112.657,33.091c-7.758,8.801-10.121,19.246-6.481,28.656c6.859,17.729,25.719,21.114,43.96,24.388
                                        c18.712,3.359,39.923,7.165,56.617,23.86s20.501,37.904,23.86,56.617c3.273,18.24,6.659,37.101,24.387,43.96
                                        c2.898,1.121,5.895,1.673,8.913,1.673c6.777,0,13.654-2.785,19.744-8.154c20.024-17.65,36.37-67.539,33.091-112.657
                                        c2.877,0.118,5.804,0.179,8.778,0.179c23.646-0.001,50.242-3.829,78.063-12.779c3.017,3.1,6.503,6.509,10.332,9.944
                                        c18.46,16.564,35.485,25.372,50.599,26.178c0.78,0.042,1.555,0.062,2.324,0.062c10.671,0,20.278-3.988,27.902-11.612
                                        c30.691-30.69,56.648-88.396,57.148-126.723c31.111-38.916,46.845-81.459,54.735-112.42
                                        C512.778,122.225,514.957,78.968,507.955,48.307z M131.127,150.704c-0.114-2.119,0.363-3.386,1.816-4.84
                                        c14.007-14.005,35.948-27.303,57.754-36.228c-18.71,22.738-33.088,46.028-43.801,68.977
                                        C138.403,168.723,131.525,158.163,131.127,150.704z M366.633,379.554c-1.452,1.452-2.721,1.923-4.829,1.817
                                        c-7.555-0.395-18.375-7.536-28.442-16.258c23.307-10.876,46.965-25.528,70.04-44.663
                                        C394.479,342.697,380.929,365.258,366.633,379.554z M469.772,155.773c-3.087,12.113-7.514,26.206-13.825,41.109
                                        c-35.728-4.401-68.985-20.566-94.623-46.206c-18.17-18.17-31.41-39.668-39.353-63.897L290.244,97.18
                                        c9.59,29.254,25.561,55.196,47.471,77.106c28.113,28.113,63.825,46.774,102.465,53.925c-9.252,15.633-20.821,31.28-35.281,45.739
                                        c-32.395,32.394-70.483,56.882-110.148,70.817c-34.333,12.061-69.698,16.056-99.583,11.245l-24.943-4.013l6.087,24.519
                                        c4.586,18.472,3.767,42.384-2.246,65.601c-3.882,14.993-8.761,25.242-12.55,31.162c-0.951-3.935-1.82-8.786-2.543-12.814
                                        c-3.804-21.197-9.015-50.229-33.114-74.328s-53.131-29.31-74.328-33.114c-4.028-0.723-8.878-1.594-12.814-2.543
                                        c5.92-3.789,16.169-8.668,31.162-12.55c23.217-6.014,47.128-6.833,65.601-2.246L160,341.773l-4.013-24.943
                                        c-4.809-29.884-0.815-65.25,11.245-99.583c13.934-39.665,38.422-77.753,70.817-110.148c38.55-38.55,85.543-56.556,118.179-64.875
                                        c35.454-9.036,66.423-10.097,87.414-7.716l0.848,32.997l32.997,0.848C479.869,89.352,478.807,120.32,469.772,155.773z"/>
                                </g>
                            </g>
                            <g>
                            <g>
                                <path d="M125.859,386.142L125.859,386.142L125.859,386.142z"/>
                            </g>
                            </g>
                        </svg>
                    </a>

                    <h3 class="trader-title">Fishmonger</h3>
                </div>

                <div class="trader">
                    <a href="../products/products.php?product-type=bakery">
                        <svg height="24" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M387.141,187.431c-31.216-29.755-71.269-47.672-114.212-51.412v-30.345c18.514-6.681,31.739-23.985,31.739-44.233
                                        c0-11.719-6.798-24.267-20.781-38.359c-8.727-8.793-17.412-15.286-17.777-15.557L256,0l-10.109,7.525
                                        c-0.366,0.272-9.051,6.764-17.776,15.557c-13.983,14.092-20.781,26.639-20.781,38.359c0,20.248,13.225,37.552,31.739,44.233
                                        v30.344c-42.944,3.74-82.997,21.657-114.213,51.412c-35.507,33.846-55.062,78.637-55.062,126.123v3.361
                                        c0,28.302,17.345,52.761,42.319,64.05V512h287.767V380.964c24.974-11.29,42.319-35.749,42.319-64.05v-3.361
                                        C442.202,266.067,422.648,221.276,387.141,187.431z M255.997,43.175c7.764,7.26,14.094,14.937,14.813,18.493
                                        c-0.134,7.245-6.726,13.1-14.809,13.1s-14.675-5.855-14.809-13.1C241.914,58.069,248.178,50.462,255.997,43.175z M366.029,478.145
                                        H145.971v-90.597c21.518-0.79,40.7-10.536,53.604-25.5c13.466,15.616,33.762,25.576,56.425,25.576s42.959-9.96,56.425-25.576
                                        c12.903,14.964,32.084,24.708,53.604,25.5V478.145z M408.35,316.914h-0.002c0,20.323-17.719,36.856-39.497,36.856
                                        s-39.497-16.533-39.497-36.856c0-0.65,0.027-1.37,0.086-2.265l1.17-18.024h-36.366l1.17,18.024
                                        c0.059,0.895,0.086,1.615,0.086,2.265c0,20.323-17.719,36.856-39.497,36.856c-21.779,0-39.497-16.532-39.497-36.856
                                        c0-0.65,0.027-1.37,0.086-2.265l1.17-18.024h-36.366l1.17,18.024c0.059,0.895,0.086,1.615,0.086,2.265
                                        c0,20.323-17.719,36.856-39.497,36.856c-21.779,0-39.497-16.532-39.497-36.856v-3.361c0-79.636,68.343-144.425,152.347-144.425
                                        S408.35,233.916,408.35,313.553V316.914z"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                    
                    <h3 class="trader-title">
                        Bakery
                    </h3>
                </div>

                <div class="trader">
                    <a href="../products/products.php?product-type=delicatessen">
                        <svg height="24" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M459.158,232.49C451.129,127.434,363.078,44.408,256,44.408c-40.364,0-78.025,11.799-109.714,32.127V7.837h-31.347v93.439
                                        c-11.934,11.465-22.473,24.366-31.347,38.422V7.837H52.245V232.49H0v15.673c0,68.379,26.628,132.668,74.981,181.019
                                        c22.465,22.465,48.372,40.232,76.529,52.827v22.154h208.98v-22.154c28.157-12.594,54.065-30.362,76.529-52.827
                                        C485.372,380.831,512,316.542,512,248.163V232.49H459.158z M427.688,232.49h-27.961c4.047-11.534,12.457-21.057,23.461-26.475
                                        C425.354,214.604,426.869,223.448,427.688,232.49z M412.71,176.325c-23.351,10.123-40.359,31.052-45.421,56.164h-31.777
                                        c5.236-36.182,28.326-67.661,61.487-83.429C403.027,157.612,408.295,166.733,412.71,176.325z M349.993,103.701
                                        c9.362,6.113,18.094,13.108,26.082,20.871c-39.933,22.005-67.057,62.321-72.165,107.918h-31.497
                                        C277.223,180.25,305.85,132.534,349.993,103.701z M256,75.755c22.117,0,43.272,4.191,62.72,11.813
                                        c-9.395,7.346-18.134,15.496-26.107,24.351c-11.899-3.195-24.171-4.817-36.613-4.817c-72.484,0-132.364,54.956-140.186,125.388
                                        H84.312C92.257,144.741,166.217,75.755,256,75.755z M179.209,232.49H147.41c7.629-53.099,53.414-94.041,108.59-94.041
                                        c5.268,0,10.491,0.394,15.651,1.132c-1.095,1.736-2.17,3.486-3.214,5.256c-4.74,8.039-8.892,16.384-12.461,24.959
                                        C218.141,169.807,186.489,196.769,179.209,232.49z M245.55,202.328c-2.279,9.899-3.815,19.982-4.598,30.162h-29.277
                                        C217.009,217.454,229.782,205.921,245.55,202.328z M256,472.816c-118.604,0-216.037-92.391-224.112-208.98h448.225
                                        C472.037,380.425,374.604,472.816,256,472.816z"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                    
                    <h3 class="trader-title">
                        delicatessen
                    </h3>
                </div>

            </div>

        </section>

    </div>

    <div class="products-container">

        <h2 class="container-title">Products you might <br>like... </h2>

        <div class="products">

            <?php
                
                $recommendationQuery = "
                    SELECT p.product_id, p.product_name, p.product_image, p.product_price
                    FROM product p
                    INNER JOIN shop s ON p.shop_id=s.shop_id
                    INNER JOIN users u ON u.user_id=s.user_id
                    INNER JOIN trader_category t ON t.category_id=u.category_id
                    LIMIT 3;
                ";

                $recommendationQueryResult = mysqli_query($connection, $recommendationQuery);
                if($recommendationQueryResult){
                    foreach($recommendationQueryResult as $product){
                        

                        echo "<div class='product'>";

                        echo "<div class='product-image'>";
                        echo "<img loading='lazy' src='$product[product_image]' alt='$product[product_name]'>";
                        echo "</div>";

                        echo "
                            <a style='color:black; text-decoration:none;' href='../productDetails/productDetails.php?productId=$product[product_id]'>
                                <h3 class='product-name'>
                                    $product[product_name]
                                </h3>
                            </a>
                        ";

                        echo "<div class='product-rating'>";

                        $productRating=0;
                        $ratedUsers=0;

                        $ratingQuery = "SELECT * FROM rating WHERE product_id=$product[product_id];";
                        $ratingQueryResult = mysqli_query($connection, $ratingQuery);

                        if($ratingQueryResult){
                            $ratedUsers=mysqli_num_rows($ratingQueryResult);

                            foreach($ratingQueryResult as $rating){

                                // adding to rating
                                $productRating=(int)$rating['rating_star'];
                            }

                            if($ratedUsers>0){
                                $productRating=$productRating/$ratedUsers;                                
                            }
                        }

                        for($i=1; $i<=5; $i++){
                            if($i<=$productRating){
                                echo "
                                    <svg class='filled-star' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z'/></svg>
                                ";
                            }else{
                                echo "
                                    <svg class='stroke-star' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z'/></svg>
                                ";
                            }

                        }

                        echo "</div>";

                        echo "<svg class='cart-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z'/></svg>";

                        echo "
                            <h3 class='product-price'>
                                &pound; $product[product_price]
                            </h3>
                        ";

                        echo "</div>";

                    }
                }
            
            ?>

        </div>

    </div>

    <?php

        include ('../footer/footer.php');
    
    ?>
    

    <script src="../navbar/navbar.js"></script>
</body>
</html>