<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head><!--
        XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
              This file is generated from xml source: DO NOT EDIT
        XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
      -->
<title>Dynamic Shared Object (DSO) Support - Apache HTTP Server</title>
<link href="./style/css/manual.css" rel="stylesheet" media="all" type="text/css" title="Main stylesheet" />
<link href="./style/css/manual-loose-100pc.css" rel="alternate stylesheet" media="all" type="text/css" title="No Sidebar - Default font size" />
<link href="./style/css/manual-print.css" rel="stylesheet" media="print" type="text/css" /><link rel="stylesheet" type="text/css" href="./style/css/prettify.css" />
<script src="./style/scripts/prettify.js" type="text/javascript">
</script>

<link href="./images/favicon.ico" rel="shortcut icon" /></head>
<body id="manual-page"><div id="page-header">
<p class="menu"><a href="./mod/">Modules</a> | <a href="./mod/directives.html">Directives</a> | <a href="http://wiki.apache.org/httpd/FAQ">FAQ</a> | <a href="./glossary.html">Glossary</a> | <a href="./sitemap.html">Sitemap</a></p>
<p class="apache">Apache HTTP Server Version 2.4</p>
<img alt="" src="./images/feather.gif" /></div>
<div class="up"><a href="./"><img title="&lt;-" alt="&lt;-" src="./images/left.gif" /></a></div>
<div id="path">
<a href="http://www.apache.org/">Apache</a> &gt; <a href="http://httpd.apache.org/">HTTP Server</a> &gt; <a href="http://httpd.apache.org/docs/">Documentation</a> &gt; <a href="./">Version 2.4</a></div><div id="page-content"><div id="preamble"><h1>Dynamic Shared Object (DSO) Support</h1>
<div class="toplang">
<p><span>Available Languages: </span><a href="./en/dso.html" title="English">&nbsp;en&nbsp;</a> |
<a href="./fr/dso.html" hreflang="fr" rel="alternate" title="Fran�ais">&nbsp;fr&nbsp;</a> |
<a href="./ja/dso.html" hreflang="ja" rel="alternate" title="Japanese">&nbsp;ja&nbsp;</a> |
<a href="./ko/dso.html" hreflang="ko" rel="alternate" title="Korean">&nbsp;ko&nbsp;</a> |
<a href="./tr/dso.html" hreflang="tr" rel="alternate" title="T�rk�e">&nbsp;tr&nbsp;</a></p>
</div>

    <p>The Apache HTTP Server is a modular program where the
    administrator can choose the functionality to include in the
    server by selecting a set of modules.
    Modules will be compiled as Dynamic Shared Objects (DSOs)
    that exist separately from the main <code class="program"><a href="./programs/httpd.html">httpd</a></code>
    binary file. DSO modules may be compiled at the time the server
    is built, or they may be compiled and added at a later time
    using the Apache Extension Tool (<code class="program"><a href="./programs/apxs.html">apxs</a></code>).</p>
    <p>Alternatively, the modules can be statically compiled into
    the <code class="program"><a href="./programs/httpd.html">httpd</a></code> binary when the server is built.</p>

    <p>This document describes how to use DSO modules as well as
    the theory behind their use.</p>
  </div>
<div id="quickview"><ul id="toc"><li><img alt="" src="./images/down.gif" /> <a href="#implementation">Implementation</a></li>
<li><img alt="" src="./images/down.gif" /> <a href="#usage">Usage Summary</a></li>
<li><img alt="" src="./images/down.gif" /> <a href="#background">Background</a></li>
<li><img alt="" src="./images/down.gif" /> <a href="#advantages">Advantages and Disadvantages</a></li>
</ul><ul class="seealso"><li><a href="#comments_section">Comments</a></li></ul></div>
<div class="top"><a href="#page-header"><img alt="top" src="./images/up.gif" /></a></div>
<div class="section">
<h2><a name="implementation" id="implementation">Implementation</a></h2>

<table class="related"><tr><th>Related Modules</th><th>Related Directives</th></tr><tr><td><ul><li><code class="module"><a href="./mod/mod_so.html">mod_so</a></code></li></ul></td><td><ul><li><code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code></li></ul></td></tr></table>

    <p>The DSO support for loading individual Apache httpd modules is based
    on a module named <code class="module"><a href="./mod/mod_so.html">mod_so</a></code> which must be statically
    compiled into the Apache httpd core. It is the only module besides
    <code class="module"><a href="./mod/core.html">core</a></code> which cannot be put into a DSO
    itself. Practically all other distributed Apache httpd modules will then
    be placed into a DSO. After a module is compiled into a DSO named
    <code>mod_foo.so</code> you can use <code class="module"><a href="./mod/mod_so.html">mod_so</a></code>'s <code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code> directive in your
    <code>httpd.conf</code> file to load this module at server startup
    or restart.</p>
    <p>The DSO builds for individual modules can be disabled via
    <code class="program"><a href="./programs/configure.html">configure</a></code>'s <code>--enable-mods-static</code>
    option as discussed in the <a href="install.html">install
    documentation</a>.</p>

    <p>To simplify this creation of DSO files for Apache httpd modules
    (especially for third-party modules) a support program
    named <code class="program"><a href="./programs/apxs.html">apxs</a></code> (<dfn>APache
    eXtenSion</dfn>) is available. It can be used to build DSO based
    modules <em>outside of</em> the Apache httpd source tree. The idea is
    simple: When installing Apache HTTP Server the <code class="program"><a href="./programs/configure.html">configure</a></code>'s
    <code>make install</code> procedure installs the Apache httpd C
    header files and puts the platform-dependent compiler and
    linker flags for building DSO files into the <code class="program"><a href="./programs/apxs.html">apxs</a></code>
    program. This way the user can use <code class="program"><a href="./programs/apxs.html">apxs</a></code> to compile
    his Apache httpd module sources without the Apache httpd distribution
    source tree and without having to fiddle with the
    platform-dependent compiler and linker flags for DSO
    support.</p>
</div><div class="top"><a href="#page-header"><img alt="top" src="./images/up.gif" /></a></div>
<div class="section">
<h2><a name="usage" id="usage">Usage Summary</a></h2>

    <p>To give you an overview of the DSO features of Apache HTTP Server 2.x,
    here is a short and concise summary:</p>

    <ol>
      <li>
        <p>Build and install a <em>distributed</em> Apache httpd module, say
        <code>mod_foo.c</code>, into its own DSO
        <code>mod_foo.so</code>:</p>

<div class="example"><p><code>
$ ./configure --prefix=/path/to/install --enable-foo<br />
$ make install
</code></p></div>
      </li>

      <li>
      <p>Configure Apache HTTP Server with all modules enabled. Only a basic
      set will be loaded during server startup. You can change the set of loaded
      modules by activating or deactivating the <code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code> directives in
      <code>httpd.conf</code>.</p>

<div class="example"><p><code>
$ ./configure --enable-mods-shared=all<br />
$ make install
</code></p></div>
      </li>

      <li>
      <p>Some modules are only useful for developers and will not be build.
      when using the module set <em>all</em>. To build all available modules
      including developer modules use <em>reallyall</em>. In addition the
      <code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code> directives for all
      built modules can be activated via the configure option
      <code>--enable-load-all-modules</code>.</p>

<div class="example"><p><code>
$ ./configure --enable-mods-shared=reallyall --enable-load-all-modules<br />
$ make install
</code></p></div>
      </li>

      <li>
        Build and install a <em>third-party</em> Apache httpd module, say
        <code>mod_foo.c</code>, into its own DSO
        <code>mod_foo.so</code> <em>outside of</em> the Apache httpd
        source tree using <code class="program"><a href="./programs/apxs.html">apxs</a></code>:

<div class="example"><p><code>
$ cd /path/to/3rdparty<br />
$ apxs -cia mod_foo.c
</code></p></div>
      </li>
    </ol>

    <p>In all cases, once the shared module is compiled, you must
    use a <code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code>
    directive in <code>httpd.conf</code> to tell Apache httpd to activate
    the module.</p>

    <p>See the <a href="programs/apxs.html">apxs documentation</a> for more details.</p>
</div><div class="top"><a href="#page-header"><img alt="top" src="./images/up.gif" /></a></div>
<div class="section">
<h2><a name="background" id="background">Background</a></h2>

    <p>On modern Unix derivatives there exists a mechanism
    called dynamic linking/loading of <em>Dynamic Shared
    Objects</em> (DSO) which provides a way to build a piece of
    program code in a special format for loading it at run-time
    into the address space of an executable program.</p>

    <p>This loading can usually be done in two ways: automatically
    by a system program called <code>ld.so</code> when an
    executable program is started or manually from within the
    executing program via a programmatic system interface to the
    Unix loader through the system calls
    <code>dlopen()/dlsym()</code>.</p>

    <p>In the first way the DSO's are usually called <em>shared
    libraries</em> or <em>DSO libraries</em> and named
    <code>libfoo.so</code> or <code>libfoo.so.1.2</code>. They
    reside in a system directory (usually <code>/usr/lib</code>)
    and the link to the executable program is established at
    build-time by specifying <code>-lfoo</code> to the linker
    command. This hard-codes library references into the executable
    program file so that at start-time the Unix loader is able to
    locate <code>libfoo.so</code> in <code>/usr/lib</code>, in
    paths hard-coded via linker-options like <code>-R</code> or in
    paths configured via the environment variable
    <code>LD_LIBRARY_PATH</code>. It then resolves any (yet
    unresolved) symbols in the executable program which are
    available in the DSO.</p>

    <p>Symbols in the executable program are usually not referenced
    by the DSO (because it's a reusable library of general code)
    and hence no further resolving has to be done. The executable
    program has no need to do anything on its own to use the
    symbols from the DSO because the complete resolving is done by
    the Unix loader. (In fact, the code to invoke
    <code>ld.so</code> is part of the run-time startup code which
    is linked into every executable program which has been bound
    non-static). The advantage of dynamic loading of common library
    code is obvious: the library code needs to be stored only once,
    in a system library like <code>libc.so</code>, saving disk
    space for every program.</p>

    <p>In the second way the DSO's are usually called <em>shared
    objects</em> or <em>DSO files</em> and can be named with an
    arbitrary extension (although the canonical name is
    <code>foo.so</code>). These files usually stay inside a
    program-specific directory and there is no automatically
    established link to the executable program where they are used.
    Instead the executable program manually loads the DSO at
    run-time into its address space via <code>dlopen()</code>. At
    this time no resolving of symbols from the DSO for the
    executable program is done. But instead the Unix loader
    automatically resolves any (yet unresolved) symbols in the DSO
    from the set of symbols exported by the executable program and
    its already loaded DSO libraries (especially all symbols from
    the ubiquitous <code>libc.so</code>). This way the DSO gets
    knowledge of the executable program's symbol set as if it had
    been statically linked with it in the first place.</p>

    <p>Finally, to take advantage of the DSO's API the executable
    program has to resolve particular symbols from the DSO via
    <code>dlsym()</code> for later use inside dispatch tables
    <em>etc.</em> In other words: The executable program has to
    manually resolve every symbol it needs to be able to use it.
    The advantage of such a mechanism is that optional program
    parts need not be loaded (and thus do not spend memory) until
    they are needed by the program in question. When required,
    these program parts can be loaded dynamically to extend the
    base program's functionality.</p>

    <p>Although this DSO mechanism sounds straightforward there is
    at least one difficult step here: The resolving of symbols from
    the executable program for the DSO when using a DSO to extend a
    program (the second way). Why? Because "reverse resolving" DSO
    symbols from the executable program's symbol set is against the
    library design (where the library has no knowledge about the
    programs it is used by) and is neither available under all
    platforms nor standardized. In practice the executable
    program's global symbols are often not re-exported and thus not
    available for use in a DSO. Finding a way to force the linker
    to export all global symbols is the main problem one has to
    solve when using DSO for extending a program at run-time.</p>

    <p>The shared library approach is the typical one, because it
    is what the DSO mechanism was designed for, hence it is used
    for nearly all types of libraries the operating system
    provides.</p>

</div><div class="top"><a href="#page-header"><img alt="top" src="./images/up.gif" /></a></div>
<div class="section">
<h2><a name="advantages" id="advantages">Advantages and Disadvantages</a></h2>

    <p>The above DSO based features have the following
    advantages:</p>

    <ul>
      <li>The server package is more flexible at run-time because
      the server process can be assembled at run-time via
      <code class="directive"><a href="./mod/mod_so.html#loadmodule">LoadModule</a></code>
      <code>httpd.conf</code> configuration directives instead of
      <code class="program"><a href="./programs/configure.html">configure</a></code> options at build-time. For instance,
      this way one is able to run different server instances
      (standard &amp; SSL version, minimalistic &amp; dynamic
      version [mod_perl, mod_php], <em>etc.</em>) with only one Apache httpd
      installation.</li>

      <li>The server package can be easily extended with
      third-party modules even after installation. This is
      a great benefit for vendor package maintainers, who can create
      an Apache httpd core package and additional packages containing
      extensions like PHP, mod_perl, mod_security, <em>etc.</em></li>

      <li>Easier Apache httpd module prototyping, because with the
      DSO/<code class="program"><a href="./programs/apxs.html">apxs</a></code> pair you can both work outside the
      Apache httpd source tree and only need an <code>apxs -i</code>
      command followed by an <code>apachectl restart</code> to
      bring a new version of your currently developed module into
      the running Apache HTTP Server.</li>
    </ul>

    <p>DSO has the following disadvantages:</p>

    <ul>
      <li>The server is approximately 20% slower at startup time
      because of the symbol resolving overhead the Unix loader now
      has to do.</li>

      <li>The server is approximately 5% slower at execution time
      under some platforms, because position independent code (PIC)
      sometimes needs complicated assembler tricks for relative
      addressing, which are not necessarily as fast as absolute
      addressing.</li>

      <li>Because DSO modules cannot be linked again