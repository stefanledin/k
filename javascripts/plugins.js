// Twitter. Thx to https://gist.github.com/furf/2415595
var twitterify = (function () {
 
  var twitterUrl = 'https://twitter.com',
      urlRegExp = /[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/g,
      atUserRegExp = /(@([A-Za-z0-9-_]+))/g,
      hashTagRegExp = /(#([A-Za-z0-9-_]+))/g;
 
  function linkToUrl (url) {
    return url.link(url);
  }
 
  function linkToUser (match, atUser, user) {
    return atUser.link(twitterUrl + '/#!/' + user);
  }
 
  function linkToTag (match, hashTag, tag) {
    return hashTag.link(twitterUrl + '/search/' + tag);
  }
 
  return function (str) {
    return str.replace(urlRegExp, linkToUrl)
      .replace(atUserRegExp, linkToUser)
      .replace(hashTagRegExp, linkToTag);
  };
})();