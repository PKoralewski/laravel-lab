FROM bitnami/laravel:12.0.3

USER root

RUN apt-get update && apt-get install -y netcat-openbsd

COPY wait-for.sh /usr/local/bin/wait-for
RUN chmod +x /usr/local/bin/wait-for

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh


ENTRYPOINT ["/entrypoint.sh"]
