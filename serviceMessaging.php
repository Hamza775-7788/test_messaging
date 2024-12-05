
<?php

require 'vendor/autoload.php';

use Google\Auth\Credentials\ServiceAccountCredentials;

function getAccessToken()
{
    $serviceAccountJson = [
        "type" => "service_account",
        "project_id" => "messages-d0119",
        "private_key_id" => "9ac0b1367bb17dace589fb05ab32c73f70a5ceab",
        "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDYlZEvNnLfNOA5\n5ScIjOjBCNNbnRHq8z6Aix+Z3ONn5PBLI0HU8sWdSW7oBGi21vtQQimYVdRSQ/dz\nYGdQX4UzZopmhb0nse/B1H7PC885KS5Qv1m3EPvhwU2gSkXHMIXF9TonPBVKptTZ\n6i87rBDks08o8RdlAwCkaM58RQo1bky1+GInJk4Oc8hlRWPu+6gDhIM85eaRT4B+\nzyJBTAY0my6OfN06654Il8nyGj/PDMBTq0ePqvqHBl9bNfpRwxFvfUefl7scwLfV\njQ7Gv/PmZX56B3NoL91dQGkRremDsHaGxTpFRxP/8KvANYnz6kVjydvX1pT3zxE2\n/JbHnwbJAgMBAAECggEAJQ7WZCMnXYyxDwbn+l0N2DWX4HWMIszS9XCYjB2Q5W51\nNQ4HzhVp/aMacGWMuzgmkRF5B4EsDpVlih7FHqnxYx2Y8bjRaDDYaqxetDN7lfa3\nX4aWJa4owvRtwU7kCJSDVx9B/4OWywqnoc+hnE6xJ0iM817pF1X/rqHmLroraH+x\nwsNwJ0ibhZeSCmzewHgJETlFMSk+4sTnxMMXYn/wE3Bz9ZbPUxZ/sApJV4T+w9fk\nhSyXbnQxsFrWaY+3CTQdZ0J+u8yNedFJl8r3eL/1ezhIyXnbg6S+syu0G87QKxXh\nteKJshuzv71Nj8jC+1suOmEeUG3dha+vsD39QC6c2QKBgQD2rsTSfAoMb4SF+bUc\nPwFmHpoXMLXoiF5L0NUo9FQmMlBWWDdNRSJYEiOpwOMTlV/zAyGFz/EAS+3ew1/i\nuPK6HSnJ+hDx49ZH5StEZ/fiD6zrPNZ6jRYyWqvcEow/a1cH473mVtrtsxfbLj/0\n10TfIc7JemRRp/T8BPwrberrjQKBgQDgw8UCuYKJmRxm6dYWx1NiKHAjGNv9WYYt\n/JftvEFco4DLFYFMS6EwiUWCpkFcFHKcxvywrsi18kHXNgUVsUijrZnuiElhJSC9\nVF/YDTlp2rLeGlPA1Pnbxq1zlkPxk7VE3SuFuxemJb0UzlA+hyGUStSq+uAWAV7L\nVOpdt5rbLQKBgQCacgG45wBDmO6YEydZb/koPrCrJExAMmEXhsBuy8qDv6yc4s59\nCnPeQD0j4yhI8pUISUWLyg1R6jgb6Kb4BGO0Mt4fHvnM+KEIkmrsgUuptbbF8Wk3\ngW4MSMihGNvGOSZcQjJ7LJYVjLO6/tH8MWtlaH1Xl9GHbmjsARMA/ei/YQKBgQC0\nI5MJPP7nIuSFgtIIDZbBq+E779eYtKB6yOBHNEM6aPx3R3QKXu8ARHSGYpMtpmG5\nTy4EuQC5+kBUqMHogd7S9/bQG0CccDJOK4ppUSf7s8D5iyYm/UqHnzMy2XL48cYt\nPAl+s9UfX02smDHt+0WpYVQS+OCSImUEF7mChP3CvQKBgGXJPOgLnd/rZycB2Inj\notgT+31bIrdkA5xU6FHBO94uk0VLv0tlqlA0CHf3WyTXT4oWxxSjBTYLLFemBe9g\nMCQKnTdklXXpyTjNXdL7Q5+X9vttfsKZ+T+k+Tvo0lJt6eEDrm9dJCUsRhPj3bwI\nilpD9hW1ixrC5At3NF3PWZgN\n-----END PRIVATE KEY-----\n",
        "client_email" => "firebase-adminsdk-w8wqz@messages-d0119.iam.gserviceaccount.com",
        "client_id" => "108048583269570197441",
        "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
        "token_uri" => "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-w8wqz%40messages-d0119.iam.gserviceaccount.com",
        "universe_domain" => "googleapis.com",
    ];

    $scopes = [
        "https://www.googleapis.com/auth/userinfo.email",
        "https://www.googleapis.com/auth/firebase.database",
        "https://www.googleapis.com/auth/firebase.messaging"
    ];

    try {
        $credentials = new ServiceAccountCredentials($scopes, $serviceAccountJson);
        $accessToken = $credentials->fetchAuthToken();

        // echo "Access Token: " . $accessToken['access_token'];
        return $accessToken['access_token'];
    } catch (Exception $e) {
        echo "Error getting access token: " . $e->getMessage();
        return null;
    }
}

// استدعاء الدالة

