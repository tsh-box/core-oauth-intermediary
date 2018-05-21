# oauth-intermediary
> An OAuth intermediary for various online services.

Most OAuth providers only support what is commonly known as 3-legged OAuth that
creates a trust relationship between the data owner (user), the data controller
(OAuth provider) and a third party. In many situations, it would be better to
have the relationship only between the user and the provider, with the
application provided by a third party but with no traffic or data flowing
through the third parties servers. One way in which to do this is for the third
party to distribute their application with their OAuth credentials embedded,
this however can be open to abuse. This application attempts to work around the
problem slightly by performing the initial authentication but then stepping out
of the way so that client credentials are never stored on the third party
servers.

Currently supported OAuth Providers:
- Healthgraph: <https://runkeeper.com/developer/healthgraph/>

## Installation
Pull this repository and copy `config.php.example` to `config.php` and edit with
your configuration information. The application is then built using
[Docker}(https://www.docker.com/), please refer to the Docker manual for
instructions on building and running.

## Meta
Distributed under the ISC license. See ``LICENSE`` for more information.

<https://github.com/tsh-box/oauth-intermediary>