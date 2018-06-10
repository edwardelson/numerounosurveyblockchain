forked from multichain

a simple voting system prototype running on multichain-based blockchain
web backend php, frontend plain html

each new address will be issued 1 "token" asset by genesis address (first address created in the blockchain)
the token could be sent to another address after it is signed by the user (with the issued private key)

limitation: this version only works on a single node. Address creation is not verified against requester's ip address / identity yet, hence many new addresses could be created without limit.
