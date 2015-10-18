/*
	Author:leridy
	date:2015/10/18
	description:The main javascript function file of mall
*/

function detectBrowser() {
    var browser = navigator.appName
    var b_version = navigator.appVersion
    var version = parseFloat(b_version)
    Messenger.options = {
        extraClasses: 'messenger-fixed messenger-on-top',
        theme: 'air'
    }
    if ((browser == "Netscape" || browser == "Microsoft Internet Explorer") && (version == 4)) {
        Messenger().post({
            message: 'You probably need to upgrade your browser to upgrade your browsing experience',
            type: 'error',
            howCloseButton: true
        });

        var msg;

        msg = Messenger().post({
            message: "Update to Chrome? You will have a good experience of this website.",
            type: 'error',
            actions: {
                retry: {
                    label: 'OK',
                    delay: 10,
                    action: function() {
                        window.open("https://www.google.com/chrome/browser/desktop/index.html", "_blank");
                    }
                },
                cancel: {
                    action: function() {
                        return msg.cancel();
                    }
                }
            }
        });
    }
}

window.onload=detectBrowser();
//浏览器检测 提示 IE8 及以下浏览器 更换浏览器
