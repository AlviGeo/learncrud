<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Emails</title>
    <link rel="stylesheet" href="../../assets/css/verify.css">
</head>

<body>
    <?php include "../layout/navbar.php"; ?>
    <table class="email-wrapper" width="100%" cellpading="0" cellspacing="0" mt="50">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpading="0" cellspacing="0">
                    <tr>
                        <td class="email-mathead">
                            <a class="email-masthead_name"></a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="email-body" width="100%">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell">
                                        <h1>Verify Your Account</h1>
                                        <br>
                                        <p>Hi, %fullname% </p>
                                        <p>Please Verify Your Account</p>
                                        <br>
                                        <div align="center">
                                            <a href="%link%" class="button button--blue">Check it out</a>
                                        </div>
                                        <br>
                                        <p style="text-align: center;">Thanks, <br>Alvi Library</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell">
                                        <p class="sub center">
                                            <br> &copy; Copyright by Alvi 2020
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>