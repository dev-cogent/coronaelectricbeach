<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'assets/html/head.html'; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/nav-bar.css">
  <link rel="stylesheet" href="/assets/css/social.css">
  <title> MERCH - Corona Electric Beach</title>

</head>


  <body>

  <!-- Start NAV bar -->
  <?php include 'assets/html/nav.html'; ?>

  <div class="main-info">
    <h1 class="text-center"> Beach Shop </h1>
    <section class="container content-section">

      <div id='collection-component-bc5a5d69268'></div>
      <script type="text/javascript">
      /*<![CDATA[*/

      (function () {
        var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
        if (window.ShopifyBuy) {
          if (window.ShopifyBuy.UI) {
            ShopifyBuyInit();
          } else {
            loadScript();
          }
        } else {
          loadScript();
        }

        function loadScript() {
          var script = document.createElement('script');
          script.async = true;
          script.src = scriptURL;
          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
          script.onload = ShopifyBuyInit;
        }

        function ShopifyBuyInit() {
          var client = ShopifyBuy.buildClient({
            domain: 'coronaelectricbeach.myshopify.com',
            apiKey: 'f0510126690f0a156dbd7d94033f6cc3',
            appId: '6',
          });

          ShopifyBuy.UI.onReady(client).then(function (ui) {
            ui.createComponent('collection', {
              id: 427253837,
              node: document.getElementById('collection-component-bc5a5d69268'),
              moneyFormat: '%24%7B%7Bamount%7D%7D',
              options: {
        "product": {
          "variantId": "all",
          "contents": {
            "imgWithCarousel": false,
            "variantTitle": false,
            "description": false,
            "buttonWithQuantity": false,
            "quantity": false
          },
          "styles": {
            "product": {
              "font-family": "'Helvetica', serif",
              "font-weight": "bolder",
              "color": "#6f4d2f",
              "margin-bottom": "40px",

              "@media (min-width: 601px)": {
                "max-width": "calc(33.33333% - 30px)",
                "margin-left": "30px",
                "margin-bottom": "50px"
              }
            },
            "button": {
              "background-color": "#10afe3",
              "font-family": "'Helvetica', serif",
              "font-weight": "bolder",
              "letter-spacing": "1px",
              "font-size": "13px",
              ":hover": {
                "background-color": "#0e9ecc"
              },
              ":focus": {
                "background-color": "#0e9ecc"
              }
            }
          }
        },
        "cart": {
          "contents": {
            "button": true
          },
          "styles": {
            "button": {
              "background-color": "#10afe3",
              ":hover": {
                "background-color": "#0e9ecc"
              },
              ":focus": {
                "background-color": "#0e9ecc"
              }
            },
            "footer": {
              "background-color": "#ffffff"
            }
          }
        },
        "modalProduct": {
          "contents": {
            "img": false,
            "imgWithCarousel": true,
            "variantTitle": false,
            "buttonWithQuantity": true,
            "button": false,
            "quantity": false
          },
          "styles": {
            "product": {
              "@media (min-width: 601px)": {
                "max-width": "100%",
                "margin-left": "0px",
                "margin-bottom": "0px"
              }
            },
            "button": {
              "background-color": "#10afe3",
              ":hover": {
                "background-color": "#0e9ecc"
              },
              ":focus": {
                "background-color": "#0e9ecc"
              }
            }
          }
        },
        "toggle": {
          "styles": {
            "toggle": {
              "background-color": "#10afe3",
              ":hover": {
                "background-color": "#0e9ecc"
              },
              ":focus": {
                "background-color": "#0e9ecc"
              }
            }
          }
        },
        "productSet": {
          "styles": {
            "products": {
              "@media (min-width: 601px)": {
                "margin-left": "-30px"
              }
            }
          }
        }
      }
            });
          });
        }
      })();
      /*]]>*/
      </script>
      </section>
  </div>

  <?php include 'assets/html/footer.html'; ?>
  </body>
</html>
