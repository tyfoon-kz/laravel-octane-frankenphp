# Course Escalation

This course continues from an already working Laravel catalog application.
The previous project taught Laravel structure, database work, admin CRUD, tests and architectural separation.
This course changes the runtime question.

The main escalation is:

```text
Can the same Laravel application run safely when PHP does not forget everything after every request?
```

The course does not present FrankenPHP as the only possible answer.
FrankenPHP is used as a practical Octane driver for learning the long-running worker lifecycle.
The engineering goal is to understand what changes when Laravel is bootstrapped once and reused across many requests:

- process memory can survive a request;
- static fields become dangerous for request-specific data;
- singleton services need lifecycle review;
- external connections and handles need cleanup strategy;
- reload/restart becomes part of deploy;
- benchmark results must be tied to a concrete bottleneck.

The product catalog domain remains the same on purpose.
The student can focus on runtime behavior instead of learning a new business model.
