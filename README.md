# TwitterTools
Check how many followers you have, see who follows you, see who you are following and how many, see your recent tweets and recent tweets of others, check who follows other people.

<img src="https://github.com/rowanaut20/TwitterTools/blob/master/TwitterTools%20v1.PNG" width="1000px" height="400px">

### How to Use
Fill in your [Twitter API](https://apps.twitter.com) information in `globals.php` in the appropriate functions.

```
class Globals {
function username() {
  return "jack";
}
function getConsumerKey() {
  return "abc123";
}
function getConsumerSecret() {
  return "12345";
}
function getAccessToken() {
  return "123-456";
}
function getAccessTokenSecret() {
  return "12345abcdef";
}
}
```
Access index.php and enjoy!

### Future Plans
- [ ] Download list of followers to a XLSX / XLS / CSV file.
- [ ] Allow logging into Twitter to follow followers directly from the web application.
- [ ] Suggest people to follow based on recent searches (find common followers of different users)
- [ ] Find out birthdays so people can be shouted out!
