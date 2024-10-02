<!-- create a php page that will redirect to secure/index.php & vulnerable/index.php respectively -->
<!DOCTYPE html>
<html>

<head>
    <title>Redirecting...</title>
    <style>
        h1 {
            position: relative;
            text-align: center;
            color: #353535;
            font-size: 50px;
            font-family: "Cormorant Garamond", serif;
        }

        #center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        form {
            display: inline-block;
        }

        .custom-btn {
            width: 130px;
            height: 40px;
            /* color: #fff; */
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn {
            border: none;
            background: rgb(251, 33, 117);
            background: linear-gradient(0deg, rgba(251, 33, 117, 1) 0%, rgba(234, 76, 137, 1) 100%);
            color: #fff;
            overflow: hidden;
        }

        .btn:hover {
            text-decoration: none;
            color: #fff;
        }

        .btn:before {
            position: absolute;
            content: '';
            display: inline-block;
            top: -180px;
            left: 0;
            width: 30px;
            height: 100%;
            background-color: #fff;
            animation: shimmer 3s ease-in-out infinite;
        }

        .btn:hover {
            opacity: .7;
        }

        .btn:active {
            box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .3),
                -4px -4px 6px 0 rgba(116, 125, 136, .2),
                inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
                inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
        }


        @-webkit-keyframes shimmer {
            0% {
                -webkit-transform: scale(0) rotate(45deg);
                opacity: 0;
            }

            80% {
                -webkit-transform: scale(0) rotate(45deg);
                opacity: 0.5;
            }

            81% {
                -webkit-transform: scale(4) rotate(45deg);
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(50) rotate(45deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div id="center">
        <h1>Choose a page to visit</h1>
        <form action="redirect.php" method="get">
            <button class="custom-btn btn" type="submit" name="page" value="secure">Secure</button>
        </form>
        <form action="redirect.php" method="get">
            <button class="custom-btn btn" type="submit" name="page" value="vulnerable">Vulnerable</button>
        </form>
    </div>
</body>

</html>