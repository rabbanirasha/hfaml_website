const schemaData = {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "HF Asset Management Ltd. | Formed by Business & Market Leaders",
    "url": "https://hfassetmanagement.com",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://hfassetmanagement.com{search_term_string}",
        "query-input": "required name=search_term_string"
    },
    "sameAs": [
        "https://facebook.com",
        "https://linkedin.com",
        "https://twitter.com"
    ]
};

const script = document.createElement('script');
script.type = 'application/ld+json';
script.text = JSON.stringify(schemaData);
document.head.appendChild(script);