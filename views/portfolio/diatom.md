?title Philosophy, Usage, Etc.
?publish 1
?render sections
?author Brendan Metzger


``` style

article {
  background-color:#fafafa;
  padding: 5%;
  max-width: 75em;
  margin:1rem;
}

article > section:first-of-type {
  columns: var(--columns);
}

article > section:first-of-type p:first-of-type {
  font-size: 162.5%;
  line-height: 1;
}

section:first-of-type > h2 {
  margin: 0;
  padding: 1rem;
  border-bottom: var(--thin-rule);
}

h1 {
  background-image:url(/ux/media/diatomea.jpg);
  mix-blend-mode:multiply;
  font-family: dapifer-stencil, sans-serif;
  font-weight: 900;
  font-style: normal;
  background-size: auto 100%;
  padding-left: 1.5em;
  background-repeat: no-repeat;
  font-size: 6em;
  color: #444;
}
#usage {
  overflow: auto;
}
#usage > section {
  padding: 1rem;
  width: 33.3%;
  float: left;
}

```

# Diatom
#### An homage to websites

```

An homage

   to
   
      > websites
   
   & craft.
   
```

## Overview

An era of frameworks began--at least for me--in the late aughts, which means that 90% of my work between then and now is tucked away in a repository and probably never to be resurrected.

Prior to that era, I have quite a bit of work that still holds up (at least technically), as my first attempts at web development were classic HTML/CSS constructions. Something that I remember back then was how shitty browsers were, how maddeningly inconsistent JavaScript and stylesheets were across browsers, and how non-existent front-end debugging tools were.

Today, those problems are totally eradicated, yet, we have *require.js* and *react*--even *jQuery*, the purveyor of joy from that frustrating is still hanging on. The amount of configuration to run these things is a nightmare--perhaps it's a matter of perspective but I loath configuration--reading it, doing it, fixing it--you name it. This stems from a metaphorical choice (a peculiar one, I've been surprised to observe) of preferring to dissect an obscure Italian sports car rather than grokking the entire assembly line of a massive domestic best-seller.

As an homage to an era of craftiness, I've developed some patterns that allows the author to focus on constructing the user experience--html, ^^Cascading Style Sheets^^, and JavaScript--in a way that doesn't feel as inelegant or repetitive as a classic HTML site, but still allows an author to write almost exclusively in those languages (including markdown) if desired. There is still dynamic, data driven programming, but the templates take center stage and complex elements can be handled with classic data models, controllers, or api integrations when necessary.

Stylesheets and JavaScript can be embedded and encoded in numerous ways, extemporaneously or calculated, to match the ebb and flow of developing ideas. Templates themselves can be mixed and match and embedded, so duplication is avoided. Data can be modeled and applied, and controllers can be declared whenever an idea becomes too complicated for the defaults in place.



## Philosophy


The ultimate goal is to **build more interesting websites,** that could function as applications, but are developed more like the websites of yesteryear. They can be trivial, exploratory, narrative-based, utilize data, and any number of other goals that need not require administrative interfaces.
     
- Configuration is absolutely minimal, and it occurs in obvious places, notably in a valid HTML template file (ie., if something is affecting the template, it should be configured in the template and avoid context switching)
- sites created in this platform need not be optimized or cached, but can be scripted easily into a static archive (the fastest thing conceivably possible).
- Optimized for ux and interactive content authorship
- Fairly robust sites operate in less than 1000 ^^Source Lines Of Code^^ (of php that is)
- custom programming and data processing can be configured in `Route` callbacks
- *Diatom* as a guiding concept melts away as an application develops its own character, and can be rewritten and amended without complaint as it is an independent piece of software.
- No dependencies


> Over the last decade I've encountered some principles that work as design guidelines as I develop, so I thought I'd share.

1. Dependencies are the boxed macaroni and cheese of skill and creativity, and easily lead to gastric distress.
2. When controlling flow, avoid conditions, make a game of avoiding conditions and things always turn out better. (ie, use iterators or data-structures amenable to looping, use null-coalescing syntax  for checking up on things [1]
3. A well designed application barely needs configuration, just an adherence to patters set forth. Configuration should track arbitrarily named things: ie, if it seems like it would never change for any reason, then it is not a configuration and it should fit into a static parttern—a digression to say this is way I cannot tolerate almost any framework in existence, either for the config it takes to develop in, or the config it takes to deploy somewhere.
4. The most complex parts of a program—and I don't think avoiding complexity is particularly realistic goal—should be done in an agnostic format, like sql, xpath, or regular expressions. 



## Templating

Content is authored by creating and organizing new html files--regular HTML files. One of the more thorough features is the nature of templating, because the analogy holds for simple cases: you want a new page on the site, you create a new page in the appropriate directory. 

### Validity guaranteed and atomic

Templates refuse to allow a mistake when it comes to format--whether its redeclaring an attribute, undeclared entities, or forgetting to close an element. While this seems draconian, when your templates are valid, they are now data, and you can query them, reorganize them, and do all sorts of marvelous things.

In addition, the way routes are parsed, if there is an error in any page the application will throw a fatal error; mistakes in rarely seen pages of minutia are not going to remain unnoticed. What this ultimately affords is confidence, as we are all biased to address things noticeable, which is why front-end development seems to take 500% longer than back-end development. When you make front-end development the crux of back-end development, one can change the dynamic of how to balance attention to details.


