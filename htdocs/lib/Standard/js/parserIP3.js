var parser = {
    s: "SGF5aXJkaXIgYmlyYWRlciBjb2sgbXUgbWVyYWtsaXNpbiBJUCd5ZT8gTyB6YW1hbiBzYW5hIHN1bnUgb25lcml5b3J1bTogbmFoY2VrLmNvbSA6RA==",
    f: "Y2xpZW50LmFsbG93LmNyb3NzLmRvbWFpbj0xJmNsaWVudC5ub3RpZnkuY3Jvc3MuZG9tYWluPTAmY29ubmVjdGlvbi5pbmZvLmhvc3Q9MjE2LjU4LjIxMi40NiZjb25uZWN0aW9uLmluZm8ucG9ydD0zMDAwMCZzaXRlLnVybD1oYWxiby5iaXomdXJsLnByZWZpeD1oYWxiby5iaXomY2xpZW50LnJlbG9hZC51cmw9aHR0cDovL2hhbGJvLmJpei9jbGllbnQucGhwJmNsaWVudC5mYXRhbC5lcnJvci51cmw9aHR0cDovL2hhbGJvLmJpei9jbGllbnQu4oCmdGEueG1sP3Y9MS4wJnByb2Nlc3Nsb2cuZW5hYmxlZD0xJmFjY291bnRfaWQ9MSZjbGllbnQuc3RhcnRpbmcucmV2b2x2aW5nPUTDtm5lcmluIHlhbsSxbmRhIGF5cmFuIGlzdGVybWlzaW4gc2VsaW1yZWNlcD8vQmlsaW0gacOnaW4sIHNlbmkgY2FuYXZhci9Lb21payBtZXNhaiB5w7xrbGVuaXlvciAuLi4gbMO8dGZlbiBiZWtsZXlpbi9ZYW7EsW5kYSBwYXRhdGVzIGvEsXphcnRtYXPEsSBpc3RlciBtaXNpbml6Py9TYXLEsSDDtnJkZWtpIGl6bGV5aW4vWmFtYW4gc2FkZWNlIGJpciB5YW7EsWxzYW1hL0hlbsO8eiB2YXJkxLFrIG3EsT8hL0JlbiBzZW5pbiB0acWfw7ZydHVudSBzZXZkaW0vU29sYSBiYWsuIFNhxJ9hIGJhay4gSWtpIGtleiB5YW7EsXAuIFRhIGRhIS9zb3J1biBzZW5kZSBkZcSfaWwsIGJlbmRlLi4uL1NoaGghIEJ1cmFkYSBkw7zFn8O8bm1leWUgw6dhbMSxxZ/EsXlvcnVtL0V2cmVuIHBpa3NlbGluIHnDvGtsZW5peW9yLi4uJmNsaWVudC5zdGFydGluZz1NZXJoYWJhISBzZWxpbXJlY2VwISAgRcSfbGVuY2UgRMO8bnlhbiBCYcWfbMSxeW9yLi4mZmxhc2guY2xpZW50LnVybD1odHRwOi8vaGFsYm8uYml6L2dvcmRvbi9QUk9EVUNUSU9OLTIwMTYwMTAxMjIwNS0yMjY2Njc0ODYvLyZzc28udGlja2V0PURFLTjigKZlci5oYXNoPTE5OTI3NTA1MmRiZjVmODlhZGIwYTY0M2JmMTZiMGVhMWNkNjQ2ZGImZmxhc2guY2xpZW50Lm9yaWdpbj1wb3B1cCI=",
    p1: function(l) {
        return l.split("").reverse().join("");
    },
    p2: function(k) {
        return k.split(btoa("/*/"));
    },
    p3: function(c) {
        var a = [];
        c.forEach(function(e) {
            a.push(atob(e));
        });
        return a;
    },
    p4: function(n) {
        return n.join(".");
    },
    p: function(y) {
        window.onload = function() {
            parser.w();
        }
        /*var t = document.getElementsByName("object");
        if (t.length < 1) return atob(parser.s);*/
        return parser.p4(parser.p3(parser.p2(parser.p1(y))));
    },
    w: function() {
        var u = document.getElementsByName("flashvars");
        u[0].vaule = parser.f;
        window.parser = false;
    }
}
